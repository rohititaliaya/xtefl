<?php

namespace App\Http\Controllers;

use App\DataTables\ContentDataTable;
use App\Models\Content;
use App\Http\Requests\StoreContentRequest;
use App\Http\Requests\UpdateContentRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Url;
use App\Models\Country;
use App\Models\SubCategory;
use App\Models\Timing;
use Exception;
use Illuminate\Http\Request;

use function GuzzleHttp\json_decode;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ContentDataTable $dataTable)
    {
        return $dataTable->render('admin.content.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $countries = Country::all();
        $cities = City::all();
        $category_id = '';
        $sections = [];
        return view('admin.content.create', compact('categories','countries','cities','subcategories','category_id','sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // return $request->all();
        try {
            
                $url = new Url;
                $url->category_slug = $request->category_slug;
                $url->subcat_slug = $request->subcat_slug;
                $url->country_slug = $request->country_slug;
                $url->city_slug = $request->city_slug;
                $url->timing_slug = $request->timing_slug;   
                $url->slug = (($request->category_slug)?'/'.$request->category_slug:'').
                (($request->subcat_slug)?'/'.$request->subcat_slug:'').      
                (($request->country_slug)?'/'.$request->country_slug:'').      
                (($request->city_slug)?'/'.$request->city_slug:'').
                (($request->timing_slug)?'/'.$request->timing_slug:'');      
                $url->title = $request->title;
                $url->body = $request->body;
                $url->meta = json_encode($request->meta);
                $url->save();
                // foreach ($request->sections as $key => $value) {
                //     $content = new Content;
                //     $content->url_id = $url->id;
                //     $content->title = $value['title'];
                //     $content->content = $value['content'];
                //     $content->order = $value['order'];
                //     $content->save();
                // }
                return redirect()->back()->with('success','Content Saved !');
       
        } catch (Exception $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContentRequest  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catsection = Content::find($id);
        $catsection->delete();
        return redirect()->back()->with('success', 'Record deleted..');
    }

    public function getsubcategory(Request $request)
    {
        $category_slug = $request->category_slug;

        $category = Category::where('slug', $category_slug)->first();
        $subcategories = SubCategory::where('category_id', $category->id)->get();
        $timings = Timing::where('category_id', $category->id)->get();

        if (count($subcategories)>0) {
            return response()->json(['flag'=>true, 'data'=>[ 
                'subcategories'=>$subcategories,
                'timings'=>$timings
                ]
            ]);
        }else{
            return response()->json(['flag'=>false, 'data'=>[ 
                'subcategories'=>$subcategories,
                'timings'=>$timings
                ]]);
        }
    }

    public function getcity(Request $request)
    {
        $country_slug = $request->country_slug;

        $country = Country::where('slug', $country_slug)->first();
        $cities = City::where('country_id', $country->id)->get();

        if (count($cities)>0) {
            return response()->json(['flag'=>true, 'data'=>$cities]);
        }else{
            return response()->json(['flag'=>false, 'data'=>$cities]);
        }
    }
}
