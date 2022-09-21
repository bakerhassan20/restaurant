<?php

namespace App\Http\Controllers;

use App\Models\discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
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
          $id = $request->id;
          $request->validate([
          'name'=>'required|max:255|unique:discounts,name,'.$id,
          'percent'=>'required|max:255'
  
        ]);
  
        $discount = discount::find($id);
        $discount->update([
  
          'name'    => $request->name,
          'percent' => $request->percent,
  
        ]);
  
         return back()->with('success','discount edited successfully');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(request $request)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, discount $discount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(discount $discount)
    {
        //
    }
}
