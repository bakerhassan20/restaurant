<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = products::all();
        return view('product.products',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.add_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:products|max:255',
            'price' => 'required',
            'image' => 'mimes:pdf,jpeg,png,jpg',

        ],[

            'name.required' =>'يرجي ادخال اسم المنج',
            'name.unique' =>'اسم المنتج مسجل مسبقا',
            'price.required' =>'يرجي ادخال سعر المنج',
            'image.mimes' => 'صيغة المرفق يجب ان تكون   pdf, jpeg , png , jpg',


        ]);
        $image = $request->file('upload');
        $file_name = $image->getClientOriginalName();
        products::create([

            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'type'=> $request->type,
            'active'=>1,
            'image'=>  $file_name,

        ]);

            // move pic

            $imageName = $request->upload->getClientOriginalName();
            $request->upload->move(public_path('Attachments/'.'images'), $imageName);

            session()->flash('Add', 'تم اضافة المنتج بنجاح');
            return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = products::findOrFail($id);
        return view('product.edit_product',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, products $products)
    {
        $id = $request->id;
        $validatedData = $request->validate([
            'name' => 'required|unique:products,name,'.$id,
            'price' => 'required',
          //  'image' => 'mimes:pdf,jpeg,png,jpg',

        ],[

            'name.required' =>'يرجي ادخال اسم المنج',
            'name.unique' =>'اسم المنتج مسجل مسبقا',
            'price.required' =>'يرجي ادخال سعر المنج',
          //  'image.mimes' => 'صيغة المرفق يجب ان تكون   pdf, jpeg , png , jpg',


        ]);

        $product = products::find($id);
        $product->update([

            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'type'=> $request->type,
            'active'=>1,
        ]);

        if($request->file("upload")){

            $path = 'Attachments/'.'images/'.$product->image;
            File::delete(public_path($path));  //delete image from public folder

            $image = $request->file('upload');
            $file_name = $image->getClientOriginalName();

           // move pic
           $imageName = $request->upload->getClientOriginalName();
           $request->upload->move(public_path('Attachments/'.'images/'),$imageName);

           $product->update([
            'image' => $file_name,
        ]);

        }
        return redirect('/Product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = products::findOrFail($id);
         $path = 'Attachments/'.'images/'.$product->image;

         File::delete(public_path($path));  //delete image from public folder
        $product->delete();
        return redirect('/Product');
    }
}
