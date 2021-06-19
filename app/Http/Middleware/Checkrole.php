<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use App\Models\Roles;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Checkrole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$permission = null)
    {
//        Lấy các roles của User
        $listRole =DB::table('users')
            ->join('users_roles','users.id','=','users_roles.id_user')
            ->join('roles','users_roles.id_role','=','roles.role_id')
            ->where('id',Auth::user()->id)->get()->pluck('role_id')->toArray();
//        dd($listRole);

//        Lấy các quyền của User
        $listPermission = DB::table('roles')
            ->join('permission_role','roles.role_id','=','permission_role.id_role')
            ->join('permission','permission_role.id_per','=','permission.per_id')
            ->whereIn('role_id',$listRole)->get()->pluck('per_id');
//        dd($listPermission );

        $checkpermisson = Permission::where('per_name',$permission)->value('per_id');
//        dd($checkpermisson);

//        Kiểm tra
        if ($listPermission->contains($checkpermisson)){
            return $next($request);
        }else{
            return redirect()->route('admin')->with('error','Bàn không có quyền sử dụng tính năng này !');
        }
    }
}
