<?php

namespace App\Http\Controllers;

use App\DataTables\CountrySectionDataTable;
use App\Http\Requests\StoreCountrySectionRequest;
use App\Http\Requests\UpdateCountrySectionRequest;
use App\Models\Category;
use App\Models\Country;
use App\Models\CountrySection;
use Exception;
use Illuminate\Http\Request;


class CountrySectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CountrySectionDataTable $dataTable)
    {
        return $dataTable->render('admin.countrysection.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $category_id = '';
        $sections = [];

        // Country
        $countries = Country::all();
        $country_id = '';

        return view('admin.countrysection.create', compact('categories','category_id','sections', 'countries', 'country_id'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCountrySectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $category_id = $request->category_id;
        $country_id = $request->country_id;

        $sections = CountrySection::where('category_id', $category_id)->where('country_id', $country_id)->count();
        if($sections!=0){
            CountrySection::where('category_id', $category_id)->where('country_id', $country_id)->delete();
        }

        try{

            foreach ($request->sections as $value) {
                $section=CountrySection::create([
                    'category_id' => $request->category_id,
                    'country_id' => $request->country_id,
                    'country_title' => $value['title'],
                    'country_content' => $value['content'],
                    'country_order' => $value['order']
                ]);
            }
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->back()->with('success', 'sections created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountrySection  $countrySection
     * @return \Illuminate\Http\Response
     */
    public function show(CountrySection $countrySection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CountrySection  $countrySection
     * @return \Illuminate\Http\Response
     */
    public function edit(CountrySection $countrySection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCountrySectionRequest  $request
     * @param  \App\Models\CountrySection  $countrySection
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCountrySectionRequest $request, CountrySection $countrySection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountrySection  $countrySection
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catsection = CountrySection::find($id);
        $catsection->delete();
        return redirect()->back()->with('success', 'Record deleted..');
    }
}
