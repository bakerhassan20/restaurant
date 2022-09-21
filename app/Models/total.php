<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class total extends Model
{
    use HasFactory;
    protected $fillable = [

        'table_id',
        'invoice_num',
        'total_price',
     

    ];
}
