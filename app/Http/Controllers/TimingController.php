<?php

namespace App\Http\Controllers;

use App\DataTables\TimingDataTable;
use App\Models\Category;
use App\Models\Timing;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TimingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TimingDataTable $dataTable)
    {
        return $dataTable->render('admin.timing.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.timing.create');
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
            'slug' => ['required',Rule::unique('sub_categories')->where(fn ($query) => $query->where('category_id', $request->category_id))]
        ]);
        
        try{
            $timing = new Timing();
            $timing->name = $request->name;
            $timing->slug = $request->slug;
            $timing->category_id = $request->category_id;
            $timing->save();
        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
        return redirect()->back()->with('success','Timing created!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Timing  $timing
     * @return \Illuminate\Http\Response
     */
    public function show(Timing $timing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Timing  $timing
     * @return \Illuminate\Http\Response
     */
    public function edit(Timing $timing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTimingRequest  $request
     * @param  \App\Models\Timing  $timing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Timing $timing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Timing  $timing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timing $timing)
    {
        //
    }

    public function timing(Request $request)
    {
        // ajax called for on select of category onv the create page in program content 
        $pcategories = Timing::where('category_id', $request->category_id)->get();
        if(count($pcategories)==0){
            return response()->json(['flag'=>false, 'data'=>$pcategories]);
        }
        return response()->json(['flag'=>true, 'data'=>$pcategories]);
    }
}
