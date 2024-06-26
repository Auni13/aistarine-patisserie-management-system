<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $table = 'order';
    protected $fillable =[
        'order_id', 
        'cust_name',
        'product_name',
        'orderquantity',
        'totalprice',
        'status',
    ];
}
