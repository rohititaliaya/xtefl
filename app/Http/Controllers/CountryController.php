<?php

namespace App\Http\Controllers;

use App\DataTables\CountryDataTable;
use App\Models\Category;
use App\Models\Country;
use App\Models\CountrySection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CountryDataTable $dataTable)
    {
       return $dataTable->render('admin.country.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);
        $country = Country::create([
            'name' => ucwords($request->name),
            'slug' => str_replace(' ','-',Str::lower($request->slug)),
        ]);
        return redirect()->back()->with('success', 'Country Added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function editcountrysection($catid, $countryid)
    {
        // we've taken the entire objects here because we need it to be used 
        // in create blace to show other values

        $countries = Country::all();
        $country_id = $countryid;

        $categories = Category::all();
        $category_id = $catid;

        $sections = CountrySection::where('category_id', $category_id)->where('country_id', $country_id)->get(); 
        return view('admin.countrysection.create', compact('categories','category_id','sections', 'countries', 'country_id'));
    }

    public function updatefeatured(Request $request)
    {
        $sc = Country::where('id', $request->id)->first();
        $sc->is_featured = ($request->state=="true")?'1':'0';
        $sc->save();
        return;

    }
}
