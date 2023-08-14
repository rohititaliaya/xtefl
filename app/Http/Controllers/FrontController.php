<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ProviderListing;
use App\Models\Url;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class FrontController extends Controller
{
    public function index(Request $request)
    {
     return redirect()->route('login');

        // $urls = Url::all();
        // $categories = Category::all();
        // $featured = ProviderListing::where('is_promoted','2')->with('provider')->get();
        // $basic = ProviderListing::where('is_promoted','1')->orWhere('is_promoted','2')->with('provider')->get();
        // $featured_banner =ProviderListing::where('is_promoted','2')->with('provider')->limit(2)->get();
        // $video =ProviderListing::where('is_promoted','2')->with('provider')->limit(1)->get();
        // return view('welcome', compact('urls','categories','featured','basic','featured_banner','video'));
    }

    public function core()
    {
        try {
            $slug = parse_url(url()->current(), PHP_URL_PATH);
            $slug = str_replace('/search','',$slug);
            $arr = explode('/',$slug)[1];
            $categoryrow = Category::where('slug', $arr)->first();
            $category = $categoryrow->id;

            $urls = Url::all();
            $categories = Category::all();
            /**
             * is promoted 
             * 0 has nothing
             * 1 basic
             * 2 featured
             * */ 
            $prebasic = ProviderListing::where('is_promoted','1')->orWhere('is_promoted','2')->get();
            $extracted = [];
            foreach ($prebasic as $bv) {
                $m = json_decode($bv->basic_category);
                
                if (in_array($category,$m)) {
                    array_push( $extracted,$bv->id);
                }
            }
            $basic = ProviderListing::whereIn('id',$extracted)->with('provider')->get();
            
            $prefeatured = ProviderListing::where('is_promoted','2')->get();
            $extracted = [];
            foreach ($prefeatured as $bv) {
                $m = json_decode($bv->promoted_category);
                
                if (in_array($category,$m)) {
                    array_push( $extracted,$bv->id);
                }
            }
            $featured = ProviderListing::whereIn('id',$extracted)->with('provider')->get();

            $featured_banner =ProviderListing::whereIn('id',$extracted)->where('is_promoted','2')->with('provider')->limit(2)->get();
            $video =ProviderListing::whereIn('id',$extracted)->where('is_promoted','2')->with('provider')->limit(1)->get();

            $url = Url::where('slug', $slug)->first();
            if ($url) {
                return view('components.core', compact('url','categories','featured','basic','featured_banner','video'));
            }else{
                return view('error.404');
            }
        } catch (\Throwable $th) {
            return view('error.404');
        }
        
    }
}
