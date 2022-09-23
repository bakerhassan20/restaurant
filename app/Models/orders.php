<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\products;
class orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'table_id',
        'fee',
        'discount',
        'voucher',
        'total'
    ];


    public function product(){
        return $this->belongsToMany(products::class,'order_product')->withPivot('quantity');
    }


}
