<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'image';
    protected $primaryKey = 'image_id';
    protected $fillable = [
      'pro_image','image',
    ];
    // public function product(){
    //     return $this->hasOne(Product::class);
    // }
    use HasFactory;
}
