<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;
class AnalyticsController extends Controller
{
    public function index()
    {
        $orders = orders::all();
        return view('analytics.analytics',compact('orders'));
    }

    public function day()
    {
        $orders = orders::whereDate( 'created_at', '>', now()->subDays(1))->get();
        return view('analytics.analytics',compact('orders'));
    }

    public function mounth()
    {

        $orders = orders::whereDate( 'created_at', '>', now()->subDays(30))->get();
        return view('analytics.analytics',compact('orders'));
    }

}
