<?php

namespace App\Http\Controllers;

use App\DataTables\ProgramTypeDataTable;
use App\Http\Requests\StoreProgramTypeRequest;
use App\Http\Requests\UpdateProgramTypeRequest;
use App\Models\ProgramType;
use Illuminate\Http\Request;

class ProgramTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProgramTypeDataTable $dataTable)
    {
        return $dataTable->render('admin.programtype.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.programtype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProgramTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:program_types,name|min:3',
            'description' => 'required'
        ]);

        $programtype = ProgramType::create($request->all());

        if ($programtype->wasRecentlyCreated === true) {
            // program type wasn't found and have been created in the database
            return redirect()->back()->with('success', 'Program type created successfully.');
        } else {
            // program type found in the database
            return redirect()->back()->with('error', 'Error creating program type.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProgramType  $programType
     * @return \Illuminate\Http\Response
     */
    public function show(ProgramType $programType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProgramType  $programType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgramType $programType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProgramTypeRequest  $request
     * @param  \App\Models\ProgramType  $programType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProgramTypeRequest $request, ProgramType $programType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProgramType  $programType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgramType $programType)
    {
        //
    }
}
