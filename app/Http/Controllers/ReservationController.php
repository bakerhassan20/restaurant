<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use App\Models\products;
use App\Models\tables;
use App\Models\discount;
use App\Models\fee;
use App\Models\voucher;
use App\Models\total;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReservationController extends Controller
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
    public function create(request $request)
    {
        $tabl_id = $request->table_id;
        $pro_id  =$request->product_id;
 
    
            //check if table exist in reservation model
            if (reservation::where('product_id',$pro_id)->where('table_id',$tabl_id)->count() > 0 ) {
                $res = reservation::where('table_id',$tabl_id)->where('product_id',$pro_id);
                $res->update([
                    'quanlity' =>  DB::raw('quanlity + 1'),
                ]);

                
             

            }else{
                reservation::create([

                    'table_id'=> $tabl_id,
                    'product_id'=>$pro_id,
                    'quanlity' =>1,
                  

                ]);
                $tabl = tables::find($tabl_id);
                $tabl->update([
                    'status'=> 2,
                ]);
                

            }
           

               return back();
         
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


    public function voucher(Request $request)
    {
       $code = $request->code;
       if(voucher::where('code',$code)->exists()){
           $data = voucher::where('code',$code)->get('price');
           $return_array = compact('data');
           return json_encode($return_array);
         
       }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $table_id = $id;
      $reservation = reservation::where('table_id',$id)->get();
      $products = products::all();
      $discount = discount::all();
      $fee = fee::all();
      $voucher = voucher::all();
      return view('reservation.reservation',compact('products','table_id','reservation','discount','fee','voucher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(request $request)
    {
        $tabl_id = $request->table_id;
        $pro_id  =$request->product_id;
        $res = reservation::where('table_id',$tabl_id)->where('product_id',$pro_id);
        $res->update([
            'quanlity' =>  DB::raw('quanlity - 1'),
                ]);
                return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reservation $reservation)
    {   $invoice_num =20;
        $table_id = $request->table_id;
        $product_id  =$request->product_id;
        $res = reservation::where('table_id',$table_id)->where('product_id',$product_id);
        $res->update([
            'quanlity' =>  DB::raw('quanlity + 1'),
                ]);
  
                return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        $tabl_id = $request->table_id;
        $pro_id  =$request->product_id;
        $res = reservation::where('table_id',$tabl_id)->where('product_id',$pro_id);
        $res->delete();
        if(reservation::where('table_id',$tabl_id)->exists()){
            $tabl = tables::find($tabl_id);
            $tabl->update([
                'status'=> 2,
            ]);
        }else{
            $tabl = tables::find($tabl_id);
            $tabl->update([
                'status'=> 1,
            ]);

           
        }
        return back();
    }
}
