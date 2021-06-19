<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey = 'post_id';
    protected $table = 'post';
    protected $fillable = [
        'title','description','content','thumbnail','status','slug',
    ];
    use HasFactory;
}
