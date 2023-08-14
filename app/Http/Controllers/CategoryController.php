<?php

namespace App\Http\Controllers;

use App\DataTables\CategoryDataTable;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\CategorySection;
use Exception;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
            'slug' => 'required|unique:categories,slug',
            'ctitle' => 'required',
            'short_desc' => 'required'
        ]);

        try {

            $category = Category::create($request->all());

        } catch (Exception $e) {

            return redirect()->back()->with('error',$e->getMessage());

        }

        return redirect()->back()->with('success', 'Category created...');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cc = Category::orderBy('order','asc')->get();
        return view('admin.category.show', compact('cc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // the edit method will seek for id as a parameter, through the route 
        // create an categories object and get all the records for that particular id, using find()
        $categories = Category::find($id);


        // return the object using compact() to convert objects into array values
        // to be used in the view to display the respective values
        return view('admin.category.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|unique:categories,name,'.$id,
            'slug' => 'required|unique:categories,slug,'.$id,
            'ctitle' => 'required',
            'short_desc' => 'required'
        ]);

        try {
            // find the category corresponding to the id passed as parameter
            $category = Category::find($id);

            // assign the values passed through $request to the respective table values
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->ctitle = $request->ctitle;
            $category->short_desc = $request->short_desc;

            //$category = Category::find($id)->update($request->all());

            $category->save();

        } catch (Exception $e) {
            return redirect()->back()->with('error',$e->getMessage()) ;
        }
        return redirect()->back()->with('success','Category updated...');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $category = Category::find($id);
            $category->delete();
        } catch(Exception $e) {
            return redirect()->back()->with('error',$e->getMessage()) ;
        }
        
        return redirect()->back()->with('success','Category deleted...');


    }

    public function editsection($id)
    {
        $categories = Category::all();
        $category_id = $id;
        $sections = CategorySection::where('category_id', $category_id)->orderBy('order', 'asc')->get(); 
        return view('admin.categorysection.create', compact('categories','category_id','sections'));
    }

    public function categoryorder(Request $request)
    {
        for ($i=1; $i <=count($request->oarray) ; $i++) { 
            $item = Category::find($i);
            $item->order = $request->oarray[$i-1];
            $item->update();
        }
        return $request->all();
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function showcategoryorder()
    {
        $cc = Category::orderBy('order','asc')->get();
        return view('admin.category.order', compact('cc'));
    }
}
