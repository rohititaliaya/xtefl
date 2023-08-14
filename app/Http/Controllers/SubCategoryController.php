<?php

namespace App\Http\Controllers;

use App\DataTables\SubCategoryDataTable;
use App\Models\Category;
use App\Models\SubCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SubCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.subcategory.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subcategory.create');
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
            $subcategory = new SubCategory();
            $subcategory->name = $request->name;
            $subcategory->slug = $request->slug;
            $subcategory->category_id = $request->category_id;
            $subcategory->save();
        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
        return redirect()->back()->with('success','program category created!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubCategoryRequest  $request
     * @param  \App\Models\SubCategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubCategoryRequest $request, SubCategory $subcategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subcategory)
    {
        //
    }

    public function subcategory(Request $request)
    {
        // ajax called for on select of category onv the create page in program content 
        $pcategories = SubCategory::where('category_id', $request->category_id)->get();
        if(count($pcategories)==0){
            return response()->json(['flag'=>false, 'data'=>$pcategories]);
        }
        return response()->json(['flag'=>true, 'data'=>$pcategories]);
    }

    public function updatefeatured(Request $request)
    {
        $sc = SubCategory::where('id', $request->id)->first();
        $sc->is_featured = ($request->state=="true")?'1':'0';
        $sc->save();
        return;

    }
}
