<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Permission;

class Roles extends Model
{
    protected $primaryKey = 'role_id';
    protected $table = 'roles';
    protected $fillable = [
      'role_name','display_name'
    ];

    public function permission(){
        return $this->belongsToMany(Permission::class,'permission_role','id_role','id_per');
    }
    use HasFactory;
}
