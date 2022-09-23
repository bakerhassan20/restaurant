<?php

namespace App\Http\Controllers;

use App\Models\tables;
use Illuminate\Http\Request;

class TablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $request->validate([

        'numberTable'=> 'required|unique:tables,table_number',
        'typeTable' =>  'required'

       ]);

       tables::create([

        'table_number'=> $request ->numberTable,
        'type' =>   $request->typeTable,
        'status' => 1

       ]);
       return back()->with('success','table added successfully');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tables  $tables
     * @return \Illuminate\Http\Response
     */
    public function show(tables $tables)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tables  $tables
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->idTable;
        $request->validate([
          'numberTable'=>'required|max:255|unique:tables,table_number,'.$id,
          'typeTable'=>'required|max:255'

        ]);

        $tables = tables::find($id);
        $tables->update([

          'table_number'    => $request->numberTable,
          'type' => $request->typeTable,

        ]);

         return back()->with('success','table edited successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tables  $tables
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->idTable;
        $request->validate([
          'numberTable'=>'required|max:255|unique:tables,table_number,'.$id,
          'typeTable'=>'required|max:255'

        ]);

        $tables = tables::find($id);
        $tables->update([

          'table_number'    => $request->numberTable,
          'type' => $request->typeTable,

        ]);

         return back()->with('success','table edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tables  $tables
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        $tables = tables::find($request->id);
        $tables->delete();
        return back()->with('success','table deleted successfuly');
    }
}
