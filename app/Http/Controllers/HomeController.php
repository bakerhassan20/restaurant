<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reservation;

use App\Models\tables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tables = tables::all();
 
       

        return view('home',compact('tables'));
    }
}
