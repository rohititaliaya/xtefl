<?php

namespace App\Http\Controllers;

use App\DataTables\CityDataTable;
use App\Models\City;
use App\Models\Country;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CityDataTable $dataTable)
    {
        return $dataTable->render('admin.city.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.city.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => ['required',Rule::unique('cities')->where(fn ($query) => $query->where('country_id', $request->country_id))]
        ]);
        
        try{
            $city = new City();
            $city->name = $request->name;
            $city->slug = $request->slug;
            $city->country_id = $request->country_id;
            $city->save();
        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
        return redirect()->back()->with('success','city created successfully !');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCityRequest  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }

    public function city(Request $request)
    {
        // ajax called for on select of country onv the create page in program content 
        $cities = City::where('country_id', $request->country_id)->get();
        if(count($cities)==0){
            return response()->json(['flag'=>false, 'data'=>$cities]);
        }
        return response()->json(['flag'=>true, 'data'=>$cities]);
    }
}
