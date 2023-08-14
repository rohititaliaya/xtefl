<?php

namespace App\Http\Controllers;

use App\DataTables\UrlDataTable;
use App\Models\Content;
use App\Models\Category;
use App\Models\City;
use App\Models\Url;
use App\Models\Country;
use App\Models\SubCategory;
use App\Models\Timing;
use Exception;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function index(UrlDataTable $dataTable)
    {
        return $dataTable->render('admin.url.index');
    }

    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $countries = Country::all();
        $cities = City::all();
        $category_id = '';
        $sections = [];
        return view('admin.url.create', compact('categories','countries','cities','subcategories','category_id','sections'));
    }

    public function store(Request $request)
    {
        $mslug = (($request->category_slug)?'/'.$request->category_slug:'').
                (($request->subcat_slug)?'/'.$request->subcat_slug:'').      
                (($request->country_slug)?'/'.$request->country_slug:'').      
                (($request->city_slug)?'/'.$request->city_slug:'').
                (($request->timing_slug)?'/'.$request->timing_slug:'');
        $urlfound = Url::where('slug',$mslug)->first();
        if($urlfound){
            return redirect()->route('admin.url.edit',$urlfound->id)->with('warning', 'Content exists! you can edit here !');    
        }
        //return $request->all();
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

    public function show(Request $request)
    {
        // // return 'hi';
        // $category_slug = $request->slug;
        // $subcat_slug = $request->slug1;
        // $country_slug = $request->slug2;
        // $city_slug = $request->slug3;
        // $timing_slug = $request->slug4;

        // $url = Url::where('category_slug',$category_slug)
        //     ->where('subcat_slug',$subcat_slug)
        //     ->where('country_slug',$country_slug)
        //     ->where('city_slug',$city_slug)
        //     ->where('timing_slug',$timing_slug)->first();
        $slug = parse_url(url()->current(), PHP_URL_PATH);
        $url = Url::where('slug', $slug)->first();
        // if ($url) {
        // $content = Content::where('url_id',$url->id)->orderBy('order','asc')->get();

        return view('admin.url.show', compact('url'));
        // }else{
        // return view('error.404');
        // }

    }

    public function order($id)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $countries = Country::all();
        $timings = Timing::all();
        $cities = City::all();
        $url = Url::find($id);
        $content = Content::where('url_id', $id)->orderBy('order', 'asc')->get();
        return view('admin.url.order', compact('categories', 'countries', 'cities', 'timings', 'subcategories', 'url', 'content'));
    }

    public function updateorder(Request $request, $id)
    {
        $content = Content::where('url_id', $id)->orderBy('order', 'asc')->get();
        for ($i = 0; $i < count($content); $i++) {
            $c = Content::find($content[$i]->id);
            $c->order = $request->oarray[$i];
            $c->save();
        }
        return;
    }

    public function edit($id)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $countries = Country::all();
        $timings = Timing::all();
        $cities = City::all();
        $url = Url::find($id);
        // $sections = Content::where('url_id',$id)->orderBy('order','asc')->get();
        return view('admin.url.edit', compact('categories', 'countries', 'cities', 'timings', 'subcategories', 'url'));
    }

    public function update(Request $request, $id)
    {

        // $sections = Content::where('url_id', $id)->count();
        // if($sections!=0){
        //     Content::where('url_id', $id)->delete();
        // }
        try {

            // foreach ($request->sections as $value) {
            //     $section=Content::create([
            //         'url_id' => $request->id,
            //         'title' => $value['title'],
            //         'content' => $value['content'],
            //         'order' => $value['order']
            //     ]);
            // }

            $url = Url::find($id);
            $url->category_slug = $request->category_slug;
            $url->subcat_slug = $request->subcat_slug;
            $url->country_slug = $request->country_slug;
            $url->city_slug = $request->city_slug;
            $url->timing_slug = $request->timing_slug;
            $url->slug = (($request->category_slug) ? '/' . $request->category_slug : '') .
                (($request->subcat_slug) ? '/' . $request->subcat_slug : '') .
                (($request->country_slug) ? '/' . $request->country_slug : '') .
                (($request->city_slug) ? '/' . $request->city_slug : '') .
                (($request->timing_slug) ? '/' . $request->timing_slug : '');
            $url->title = $request->title;
            $url->body = preg_replace('#(<[a-z ]*)(style=("|\')(.*?)("|\'))([a-z ]*>)#', '\\1\\6', $request->body);            ;
            $url->meta = json_encode($request->meta);
            $url->save();

        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->back()->with('success', 'sections updated !');
    }

    public function find(Request $request)
    {
        // 2 methods
        $slug = '/' . rtrim(str_replace('//', '/', implode("/", $request->data)), "/");
        $url = Url::where('slug', $slug)->first();
        if ($url) {
            return response()->json(['flag' => true, 'data' => $url]);
        } else {
            return response()->json(['flag' => false]);
        }
    }
}
