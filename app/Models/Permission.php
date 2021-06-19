<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $primaryKey = 'per_id';
    protected $table = 'permission';
    protected $fillable = [
        'per_name','display_name',
    ];
    public function roles(){
        return $this->belongsToMany(Roles::class,'permission_role','per_id','role_id');
    }
    use HasFactory;
}
