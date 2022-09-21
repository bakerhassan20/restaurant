<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'table_id',
        'product_id',
        'quanlity',
        'quanlity_price'
    ];


    public function product(){
        return $this ->belongsTo('App\Models\products');
    }


   
}
