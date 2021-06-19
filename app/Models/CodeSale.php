<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeSale extends Model
{
    protected $primaryKey = 'code_id';
    protected $table = 'code_sale';
    protected $fillable = [
      'code_name','code_name','code_value',
    ];
    use HasFactory;
}
