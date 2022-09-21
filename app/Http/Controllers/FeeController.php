<?php

namespace App\Http\Controllers;

use App\Models\fee;
use Illuminate\Http\Request;

class FeeController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function show(fee $fee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function edit(request  $request)
    {
      $id = $request->id;
      $request->validate([
        'name'=>'required|max:255|unique:fees,name,'.$id,
        'percent'=>'required|max:255'

      ]);

      $fee = fee::find($id);
      $fee->update([

        'name'    => $request->name,
        'percent' => $request->percent,

      ]);

       return back()->with('success','fee edited successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fee $fee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function destroy(fee $fee)
    {
        //
    }
}
