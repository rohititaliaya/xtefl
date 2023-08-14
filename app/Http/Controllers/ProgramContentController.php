<?php

namespace App\Http\Controllers;

use App\DataTables\ProgramContentDataTable;
use App\Http\Requests\StoreProgramContentRequest;
use App\Http\Requests\UpdateProgramContentRequest;
use App\Models\Category;
use App\Models\ProgramCategory;
use App\Models\ProgramContent;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProgramContentDataTable $dataTable)
    {
        return $dataTable->render('admin.programcontent.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $pcategories = DB::table('program_categories as pc')
        // ->join('categories as cat', 'pc.category_id', '=', 'cat.id')
        // ->select('pc.*', 'cat.name as cname')
        // ->get();
        $pcategory = '';
        $sections = [];
        $categories = Category::all();
        return view('admin.programcontent.create', compact('categories', 'pcategory','sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProgramContentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pcategory_id = $request->pcategory_id;
        $sections = ProgramContent::where('pcategory_id', $pcategory_id)->count();
        if($sections!=0){
            ProgramContent::where('pcategory_id', $pcategory_id)->delete();
        }
        try{

            foreach ($request->sections as $value) {
                $section=ProgramContent::create([
                    'pcategory_id' => $request->pcategory_id,
                    'title' => $value['title'],
                    'content' => $value['content'],
                    'order' => $value['order']
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
     * @param  \App\Models\ProgramContent  $programContent
     * @return \Illuminate\Http\Response
     */
    public function show(ProgramContent $programContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProgramContent  $programContent
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgramContent $programContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProgramContentRequest  $request
     * @param  \App\Models\ProgramContent  $programContent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProgramContentRequest $request, ProgramContent $programContent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProgramContent  $programContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgramContent $programContent)
    {
        //
    }

    public function editprogramcontent($id)
    {
        $categories = Category::all();
        $pcategory_id = $id;
        $pcategory = ProgramCategory::find($id);
        $sections = DB::table('program_contents as pc')
        ->join('program_categories as pcat','pc.pcategory_id','pcat.id')
        ->where('pc.pcategory_id', $pcategory_id)
        ->select('pcat.category_id', 'pc.*')
        ->get(); 
        return view('admin.programcontent.create', compact('categories','pcategory','pcategory_id','sections'));
    }
}
