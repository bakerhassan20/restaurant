<?php

namespace App\Http\Controllers;

use App\Models\theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function show(theme $theme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function edit(theme $theme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $request ->validate([

        'color1'=> 'required',
        'color2'=> 'required',
        'color3'=> 'required',
        'color4'=> 'required',

       ]);
       $theme= theme::find(1);
       $theme->update([

        'color1' => $request->color1,
        'color2' => $request->color2,
        'color3' => $request->color3,
        'color4' => $request->color4,
       ]);

         return back()->with('success','theme changed successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy(theme $theme)
    {
        //
    }
}
