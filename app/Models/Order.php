<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamp=true;

    protected $fillable = [
        'order_id',
        'user_id',
        'address_id',
        'product_id',
        'price',
        'qty',
    ];
}
