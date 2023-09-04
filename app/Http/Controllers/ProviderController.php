<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProviderRequest;
use App\Http\Requests\UpdateProviderRequest;
use App\Mail\ListingMail;
use App\Models\Category;
use App\Models\Listing;
use App\Models\ListingState;
use App\Models\Provider;
use App\Models\ProviderListing;
use App\Models\User;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\List_;

class ProviderController extends Controller
{
    public $user_id;
    public function __consruct()
    {
        if (Auth::user()) {
            $this->user_id = Auth::user()->id;
        }else{
            return redirect()->to('/provider/login');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = ProviderListing::where('provider_id',Auth::user()->id)->get();
        return view('provider.home',compact('listings'));
    }

    public function allListings()
    {
        $listings = ProviderListing::where('provider_id',Auth::user()->id)->get();
        return view('provider.listings.index',compact('listings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addlisting()
    {
        $categories = Category::all();
        return view('provider.addlisting',compact('categories'));
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProviderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // "basic_category"=>"required",
            "title"=>'required|max:75',
            "image"=>"required|image|mimes:png,jpg,jpeg|max:1024",
            "listing_url"=>"required",

            "promoted_title"=>"max:75",
            "promoted_desc"=>"max:150",

            "video_title"=>"max:75",
        ]);
        // return $this->user_id;
        $reference_id = $this->generateRandomString();
        // return $reference_id;
        $user_id = Auth::user()->id;

        $imageName = time().'_'.$user_id.'.'.$request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);

        $pimageName = "";
        if ($request->promoted_image) {
            $pimageName = 'p_'.time().'_'.$user_id.'.'.$request->promoted_image->extension();
            $request->promoted_image->move(public_path('uploads'), $pimageName);                
        }
        $pb = "";
        if ($request->promoted_banner) {
            // return $request->promoted_banner->extension();
            $pb = 'pb_'.time().'_'.$user_id.'.'.$request->promoted_banner->extension();
            $request->promoted_banner->move(public_path('uploads'), $pb);                
        }
        $basic_category = [];
        $promoted_category = [];
        // return $request->has('promoted_banner');
        $provider = new ProviderListing;
        $provider->reference_id = $reference_id;
        $provider->provider_id = $user_id;
        $provider->basic_category = json_encode($basic_category);
        $provider->title = $request->title;
        $provider->image = $imageName;
        $provider->listing_url = $request->listing_url;

        $provider->promoted_category = json_encode($promoted_category);
        $provider->promoted_title = $request->promoted_title;
        $provider->promoted_desc = $request->promoted_desc;
        $provider->promoted_img = $pimageName;
        $provider->promoted_banner = $pb;

        $provider->video = $request->video_url;
        $provider->video_title = $request->video_title;
        $provider->save();

        $mprovider = User::find($user_id); 
        $data = [
            'title' => 'You have created Listing',
            'content' => '<h5>Please contect us</h5>'
        ];
        $mail = new ListingMail('You have created Listing');
        $mail->to($mprovider->email);
        $mail->viewData = compact('data');
        Mail::send($mail);

        // sending email to admin
        $data = [
            'title' => 'Someone have created Listing',
            'content' => '<h5>Please contect him</h5>'
        ];
        $amail = new ListingMail('Someone created Listing');
        $amail->to(env('ADMIN_USER'));
        $amail->viewData = compact('data');
        Mail::send($amail);

        return redirect()->back()->with('success','Record saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listing = ProviderListing::find($id);

        return view('provider.showlisting', compact('listing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing = ProviderListing::find($id);
        // return $listing;
        return view('provider.editlisting',compact('listing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProviderRequest  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "title"=>'required|max:75',
            "image"=>"image|mimes:png,jpg,jpeg|max:1024",
            "listing_url"=>"required",
            // "promoted_title"=>"required|max:75",
            // "promoted_image"=>"required",
            // "video_url"=>"required"
        ]);
        $user_id = Auth::user()->id;

        $listing = ProviderListing::find($id);

        $imageName = $listing->image;
        if ($request->image) {
            $imageName = time().'_'.$user_id.'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            File::delete(public_path('uploads/'.$listing->image));
        }

        $pimageName = $listing->promoted_img;
        if ($request->promoted_image) {
            $pimageName = 'p_'.time().'_'.$user_id.'.'.$request->promoted_image->extension();
            $request->promoted_image->move(public_path('uploads'), $pimageName);             
            File::delete(public_path('uploads/'.$listing->promoted_img));
        }

        $pb = "";
        if ($request->promoted_banner) {
            // return $request->promoted_banner->extension();
            $pb = 'pb_'.time().'_'.$user_id.'.'.$request->promoted_banner->extension();
            $request->promoted_banner->move(public_path('uploads'), $pb);                
        }

        $listing->title = $request->title;
        $listing->image = $imageName;
        $listing->promoted_title = $request->promoted_title;
        $listing->promoted_img = $pimageName;
        $listing->promoted_banner = $pb;

        $listing->listing_url = $request->listing_url;
        $listing->video = $request->video_url;
        $listing->save();

        $mprovider = User::find($user_id); 

        $data = [
            'title' => 'You have edited Listing',
            'content' => '<h5>Please contect us</h5>'
        ];
        $mail = new ListingMail('You have created Listing');
        $mail->to($mprovider->email);
        $mail->viewData = compact('data');
        Mail::send($mail);

        // sending email to admin
        $data = [
            'title' => 'You have edited Listing',
            'content' => '<h5>Please contect us</h5>'
        ];
        $amail = new ListingMail('Someone created Listing');
        $amail->to(env('ADMIN_USER'));
        $amail->viewData = compact('data');
        Mail::send($amail);

        return redirect()->back()->with('success','Record updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        //
    }

    public function get_impression_data(Request $request)
    {
        // Get the date range for the chart
        $start_date = date('Y-m-d', strtotime('-7 days'));
        $end_date = date('Y-m-d');
        // Query the database for impressions and clicks data
        $data = ListingState::where('listing_id', $request->listing_id)->whereBetween('created_at', [$start_date. ' 00:00:00', $end_date. ' 23:59:59'])->orderBy('created_at', 'asc')->get();
        
        // Initialize arrays for the chart data
        $dates = array();
        $impressions = array();
        $clicks = array();

        // Loop through the data and add missing dates with 0 values
        $current_date = date('Y-m-d', strtotime($start_date));
        foreach ($data as $row) {
            while ($current_date < $row->created_at) {
                $dates[] = $current_date;
                $impressions[] = 0;
                $clicks[] = 0;
                $current_date = date('Y-m-d', strtotime($current_date . ' +1 day'));
            }
            $dates[] =date('Y-m-d', strtotime($row->created_at) );
            $impressions[] = $row->impressions;
            $clicks[] = $row->clicks;
            $current_date = date('Y-m-d', strtotime($row->date . ' +1 day'));
        }
        // Add any remaining dates with 0 values
        while ($current_date <= $end_date) {
            $dates[] = $current_date;
            $impressions[] = 0;
            $clicks[] = 0;
            $current_date = date('Y-m-d', strtotime($current_date . ' +1 day'));
        }
        // dd($impressions);

        // Create the chart data object
        $data = array(
            'labels' => $dates,
            'datasets' => array(
                array(
                    'label' => 'Impressions',
                    'data' => $impressions,
                    'backgroundColor' => 'transparent',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 3,
                    'pointBackgroundColor'=> 'transparent',
                    'pointHoverBackgroundColor'=> '#4A6CF7',
                    'pointBorderColor'=> 'transparent',
                    'pointHoverBorderColor'=> '#fff',
                    'pointHoverBorderWidth'=> 5,
                    'pointBorderWidth'=> 5,
                    'pointRadius'=> 8,
                    'pointHoverRadius'=> 8,
                ),
                array(
                    'label' => 'Clicks',
                    'data' => $clicks,
                    'backgroundColor' => 'transparent',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 3,
                    'pointBackgroundColor'=> 'transparent',
                    'pointHoverBackgroundColor'=> '#4A6CF7',
                    'pointBorderColor'=> 'transparent',
                    'pointHoverBorderColor'=> '#fff',
                    'pointHoverBorderWidth'=> 5,
                    'pointBorderWidth'=> 5,
                    'pointRadius'=> 8,
                    'pointHoverRadius'=> 8,
                )
            )
        );

       
         return response()->json(['data'=>$data]);
    }

    public function storeListing(Request $request){
        
        // dd($request->all());
        $data = $request->all(); 
        $user_id = Auth::user()->id;
        // dd($request->recomm_image->extension());
        // $reference_id = $this->generateRandomString();
        $data['reference_id'] = $this->generateRandomString();
        // $request->reference_id = $reference_id;

        // dd($data);
        $recomm_image = "";
        if ($request->recomm_image) {
            $recomm_image = 'p_'.time().'_'.$user_id.'.'.$request->recomm_image->extension();
            $request->recomm_image->move(public_path('uploads'), $recomm_image);             
            
        }

        $popular_image = "";
        if ($request->popular_image) {
            $popular_image = 'p_'.time().'_'.$user_id.'.'.$request->popular_image->extension();
            $request->popular_image->move(public_path('uploads'), $popular_image);             
            
        }

        $featured_image = "";
        if ($request->featured_image) {
            $featured_image = 'p_'.time().'_'.$user_id.'.'.$request->featured_image->extension();
            $request->featured_image->move(public_path('uploads'), $featured_image);             
            
        }

        $org_image = "";
        if ($request->org_image) {
            $org_image = 'p_'.time().'_'.$user_id.'.'.$request->org_image->extension();
            $request->org_image->move(public_path('uploads'), $org_image);             
            
        }
        $data['recomm_image'] = $recomm_image;
        $data['popular_image'] = $popular_image;
        $data['featured_image'] = $featured_image;
        $data['org_image'] = $org_image;

        if ($request->same_as == "on") {
            $data['same_as'] = '1';
        }else {
            $data['same_as'] = '0';
        }

        $plisting = ProviderListing::create($data);
        return redirect()->back()->withSuccess('Listing Added Successfully !');
    }

    public function basic() {
        return view('provider.listings.basic');    
    }

    public function video() {
        return view('provider.listings.video');    
    }

    public function org() {
        return view('provider.listings.org');    
    }

    public function featured() {
        return view('provider.listings.featured');    
    }
}
