<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_id';
    protected $table = 'order';
    protected $fillable = [
        'name','email','phone','tinh','huyen','xa','address','note','pay','status'
    ];
    use HasFactory;
}
