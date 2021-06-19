<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index(){
        $roles = Roles::get();
        $permission = Permission::get();
        return view('back-end.page.roles.addRoles',compact('roles','permission'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'rolename' => 'required|unique:roles,role_name',
            'displayname' => 'required|unique:roles,display_name',
            'permission' => 'required',
        ],[
            'rolename.required' => 'Tên quyền không được để trống !',
            'rolename.unique' => 'Tên quyền đã tồn tại !',
            'displayname.required' => 'Tên hiển thị của quyền không được để trống !',
            'displayname.unique' => 'Tên hiển thị của quyền đã tồn tại !',
            'permission.required' => 'Tác vụ không được để trống'
        ]);
        $roles = new Roles();
        $roles->role_name = $request->rolename;
        $roles->display_name = $request->displayname;
        $roles->save();
        $roles->permission()->attach($request->permission);
        return back()->with('message','Thêm quyền thành công !');
    }
    public function show($id){
    $role = Roles::where('role_id',$id)->first();
    $permission = Permission::get();
    $listPer = DB::table('permission_role')->where('id_role',$id)->pluck('id_per');
    return view('back-end.page.roles.editRole',compact('permission','listPer','role'));
    }
    public function update(Request $request){
        $this->validate($request,[
            'rolename' => 'required',
            'displayname' => 'required',
            'permission' => 'required',
        ],[
            'rolename.required' => 'Tên quyền không được để trống !',
            'displayname.required' => 'Tên hiển thị của quyền không được để trống !',
            'permission.required' => 'Tác vụ không được để trống'
        ]);
        $role = Roles::where('role_id',$request->role_id)->first();
        $role->role_name = $request->rolename;
        $role->display_name = $request->displayname;
        $role->save();
        $role->permission()->detach();
        $role->permission()->attach($request->permission);
        return redirect()->route('Role.index')->with('message','Sửa thành công !');
    }

    public function destroy($id){
        $role = Roles::where('role_id',$id)->first();
        $role->delete();
        $role->permission()->detach();
        return back()->with('message','Xóa thành công !');
    }
}
