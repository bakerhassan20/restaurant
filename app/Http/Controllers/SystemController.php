<?php

namespace App\Http\Controllers;

use App\Models\voucher;
use App\Models\fee;
use App\Models\discount;
use App\Models\tables;
use App\Models\theme;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function system(){
      
        $discount = discount::all();
        $vouchers = voucher::all();
        $tables = tables::all();
        $theme = theme::all()->first();
        $fee = fee::all();
        return view('system.system',compact('vouchers','fee','discount','tables','theme'));
    }
}
