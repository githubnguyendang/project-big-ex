<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Key_word extends Model
{
    protected $table = 'key_word';
    protected $primaryKey = 'key_id';
    protected $fillable = [
        'key_name','views',
    ];
    use HasFactory;
}
