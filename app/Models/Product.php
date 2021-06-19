<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'pro_id';
    protected $table = 'Products';
    protected $fillable = [
        'pro_cate',
        'pro_name',
        'pro_slug',
        'pro_price',
        'pro_author',
        'pro_thumbnail',
        'pro_image',
        'status',
        'pro_description',
        'pro_sdescription',
        'pro_sale',
        'status',
    ];
    public function Category(){
        return $this->hasOne(Category::class);
    }
    public function Image(){
        return $this->hasMany(Image::class,'pro_image','pro_id');
    }
    use HasFactory;

}
