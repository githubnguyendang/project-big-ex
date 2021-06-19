<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $primaryKey = 'cate_id';
    protected $table = 'Category';
    protected $fillable = [
      'cate_name',
        'cate_slug',
        'parent_id',
    ];
    public function products()
    {
        return $this->hasMany(Product::class,'pro_cate','cate_id')->where('status',0)->orderBy('pro_id','DESC');
    }
//
    public function CatChils(){
        return $this->hasMany(Category::class,'parent_id','cate_id');
    }
    use HasFactory;
}
