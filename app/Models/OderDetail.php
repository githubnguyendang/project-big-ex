<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OderDetail extends Model
{
    protected $primaryKey = 'detail_id';
    protected $table = 'order_detail';
    protected $fillable = [
        'product_id','price','quantity','order_detail',
    ];
    use HasFactory;
}
