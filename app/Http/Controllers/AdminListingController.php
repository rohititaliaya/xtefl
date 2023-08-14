<?php

namespace App\Http\Controllers;

use App\DataTables\ProviderListingDataTable;
use App\Models\Category;
use App\Models\Listing;
use App\Models\ListingImpression;
use App\Models\ListingClick;
use App\Models\ListingState;
use App\Models\ProviderListing;
use Carbon\Carbon;
use Exception;
use GrahamCampbell\ResultType\Success;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GeoIP;

class AdminListingController extends Controller
{
    public function index(ProviderListingDataTable $dataTable)
    {
        return $dataTable->render('admin.listings.index');
    }

    public function makePromoted(Request $request)
    {
        $row = $request->data['rowid'];
        $package = $request->data['package'];
        $months = $request->data['months'];
        try {
            $providerlisting = ProviderListing::find($row);
            $providerlisting->is_promoted = $package;
            $providerlisting->months = $months;
            $providerlisting->startdate = date('Y-m-d');
            $providerlisting->enddate = date('Y-m-d', strtotime('+' . $months . ' month', strtotime(date('Y-m-d'))));
            $providerlisting->save();
            return response()->json(['flag' => true, 'data' => $providerlisting]);
        } catch (Exception $th) {
            return response()->json(['flag' => false, 'data' => $th]);
        }
    }

    public function edit($row)
    {
        $listing = ProviderListing::find($row);
        $categories = Category::all();
        return view('admin.listings.edit', compact('listing', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:75',
            'image' => 'image|mimes:png,jpg,jpeg|max:1024',
            'listing_url' => 'required',

            'promoted_title' => 'max:75',
            'promoted_desc' => 'max:150',

            'video_title' => 'max:75',
        ]);
        $provider = ProviderListing::find($id);
        $user_id = $provider->provider_id;
        $imageName = $provider->image;
        if ($request->image) {
            $imageName = time() . '_' . $user_id . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
        }
        $pimageName = $provider->promoted_img;
        if ($request->promoted_image) {
            $pimageName = 'p_' . time() . '_' . $user_id . '.' . $request->promoted_image->extension();
            $request->promoted_image->move(public_path('uploads'), $pimageName);
        }
        if ($request->has('is_promoted')) {
            $provider->is_promoted = $request->is_promoted;
        }

        $provider->basic_category = json_encode($request->basic_category);
        $provider->title = $request->title;
        $provider->image = $imageName; //basic image
        $provider->listing_url = $request->listing_url;

        $provider->promoted_category = json_encode($request->promoted_category);
        $provider->promoted_title = $request->promoted_title;
        $provider->promoted_desc = $request->promoted_desc;
        $provider->promoted_img = $pimageName; //promoted image

        $provider->video = $request->video_url;
        $provider->video_title = $request->video_title;
        $provider->months = $request->months;
        $provider->startdate = $request->startdate;
        $provider->enddate = $request->enddate;

        $provider->save();

        return redirect()
            ->back()
            ->with('success', 'Record Updated');
    }

    public function getlistings()
    {
        $listing = ProviderListing::limit(2)->get();

        if ($listing) {
            $html = '<div class="col-lg-4">';
            $html .= view('components.apilisting', compact('listing'))->render();
            $html .= '</div>';
            return response()->json(['status' => true, 'html' => $html, 'data' => $listing->pluck('id'), 'message' => 'Success']);
        }
        return response()->json(['status' => false, 'data' => '', 'message' => 'Failed']);
    }

    public function listingcount(Request $request)
    {
        $today = date('Y-m-d');
        $listingstate = ListingState::where('listing_id', $request->listing)
            ->whereDate('created_at', $today)
            ->first();
        if ($listingstate) {
            $listingstate->clicks = $listingstate->clicks + 1;
            $listingstate->save();
        } else {
            $newstate = new ListingState();
            $newstate->listing_id = $request->listing;
            $newstate->impressions = 1;
            $newstate->clicks = 1;
            $newstate->save();
        }
        return redirect()->to($request->url);
    }

    public function countimpression(Request $request)
    {
        $today = date('Y-m-d');
        foreach ($request->listing as $item) {
            $listingstate = ListingState::where('listing_id', $item)
                ->whereDate('created_at', $today)
                ->first();
            if ($listingstate) {
                $listingstate->impressions = $listingstate->impressions + 1;
                $listingstate->country = $request->country;
                $listingstate->ip = $request->ip;
                $listingstate->device = $request->mobile == 'true' ? 'Mobile' : 'Desktop';
                $listingstate->save();
            } else {
                $newstate = new ListingState();
                $newstate->listing_id = $item;
                $newstate->impressions = 1;
                $newstate->clicks = 0;
                $newstate->country = $request->country;
                $newstate->ip = $request->ip;
                $newstate->device = $request->mobile == 'true' ? 'Mobile' : 'Desktop';

                $newstate->save();
            }
        }
        return response()->json(['status' => true]);
    }

    public function showListings(Request $request)
    {
        $ip = $request->ip();
        $country = 'Unknown';
        $mobile = $request->mobile;

        $featured_listing = Listing::where('type', 'featured')
            ->with('provider')
            ->limit(2)
            ->get();
        $featured = view('provider.components.featured', compact('featured_listing', 'country', 'ip', 'mobile'))->render();

        $basic_listing = Listing::where('type', 'basic')
            ->with('provider')
            ->limit(6)
            ->get();
        $basic = view('provider.components.basic', compact('basic_listing', 'country', 'ip', 'mobile'))->render();
        $recommanded = view('provider.components.recommanded', compact('basic_listing', 'country', 'ip', 'mobile'))->render();

        $video_listing = Listing::where('type', 'video')
            ->with('provider')
            ->limit(1)
            ->first();
        $video = view('provider.components.video', compact('video_listing', 'country', 'ip', 'mobile'))->render();

        $org_listing = Listing::where('type', 'org')
            ->with('provider')
            ->limit(1)
            ->first();
        $organization = view('provider.components.org', compact('org_listing', 'country', 'ip', 'mobile'))->render();

        return response()->json([
            'status' => true,
            'featured' => $featured,
            'basic' => $basic,
            'org' => $organization,
            'video' => $video,
            'recommanded' => $recommanded,
            'data' => [
                'featured' => $featured_listing->pluck('id'),
                'basic' => $basic_listing->pluck('id'),
            ],
            'message' => 'Success',
        ]);
    }

    public function recordimpression(Request $request)
    {
        $today = date('Y-m-d');
        foreach ($request->listing as $item) {
            $listing = Listing::find($item);

            $imp = new ListingImpression();
            $imp->listing_id = $item;
            $imp->provider_id = $listing->provider_id;
            $imp->type = $listing->type;
            $imp->country = $request->country;
            $imp->ip = $this->convertip($request->ip);
            $imp->device = $request->mobile == 'true' ? 'Mobile' : 'Desktop';
            $imp->save();
        }
        return response()->json(['status' => true]);
    }

    public function showBasicListings(Request $request)
    {
        $country = $request->country;
        $ip = $request->ip;
        $mobile = $request->mobile;
        $listings = Listing::where('type', 'basic')
            ->with('provider')
            ->limit(6)
            ->get();
        if (count($listings) > 0) {
            $html = view('provider.components.basic', compact('listings', 'country', 'ip', 'mobile'))->render();

            return response()->json(['status' => true, 'html' => $html, 'data' => $listings->pluck('id'), 'message' => 'Success']);
        }
        return response()->json(['status' => false, 'data' => '', 'message' => 'Failed']);
    }

    public function recordbasicimpression(Request $request)
    {
        $today = date('Y-m-d');
        foreach ($request->listing as $item) {
            $listing = Listing::find($item);

            $imp = new ListingImpression();
            $imp->listing_id = $item;
            $imp->provider_id = $listing->provider_id;
            $imp->type = $listing->type;
            $imp->country = $request->country;
            $imp->ip = $this->convertip($request->ip);
            $imp->device = $request->mobile == 'true' ? 'Mobile' : 'Desktop';
            $imp->save();
        }
        return response()->json(['status' => true]);
    }

    public function listingclicks(Request $request)
    {
        $listing = Listing::find($request->listing);

        $click = new ListingClick();
        $click->listing_id = $request->listing;
        $click->attribute = $request->attribute;
        $click->provider_id = $listing->provider_id;
        $click->type = $listing->type;
        $click->country = $request->country;
        $click->ip = $this->convertip($request->ip);
        $click->device = $request->mobile == 'true' ? 'Mobile' : 'Desktop';
        $click->save();

        return redirect()->to($listing->url);
    }

    public function basicClicks(Request $request)
    {
        $listing = Listing::find($request->listing);

        $click = new ListingClick();
        $click->listing_id = $request->listing;
        $click->attribute = $request->attribute;
        $click->provider_id = $listing->provider_id;
        $click->type = $listing->type;
        $click->country = $request->country;
        $click->ip = $this->convertip($request->ip);
        $click->device = $request->mobile == 'true' ? 'Mobile' : 'Desktop';
        $click->save();

        return redirect()->to($listing->url);
    }

    public function convertip($ipv6)
    {
        $binary = inet_pton($ipv6);
        $ipv4Binary = substr($binary, -4);
        $ipv4 = inet_ntop($ipv4Binary);
        return $ipv4;
    }
}
