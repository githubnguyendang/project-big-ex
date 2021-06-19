<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Roles;

class UserController extends Controller
{
    public function index(){
        $user = User::with('roles')->Paginate(10);
//        dd($user);
        $roles = Roles::get();
        return view('back-end.page.user.user',compact('user','roles'));
    }
    public function store(UserRequest $request)
    {
        $user = new User();
        $user->user_name = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $user->roles()->attach($request->roles);
        return back()->with('message', 'Thêm quản trị viên thành công !');
    }
    public function show($id){
    $user = User::where('id',$id)->first();
    $roles = Roles::get();
    $listRoles = DB::table('users_roles')->where('id_user',$id)->pluck('id_role');
    return view('back-end.page.user.editUser',compact('user','roles','listRoles'));
    }
    public function update(Request $request){

        $this->validate($request,[
            'username' => 'required',
            'email' => 'required|email',
            'roles' => 'required',
        ],[
            'username.required' => 'User_name không được để trống !',
            'email.required' => 'Email không được để trống !',
            'email.email' => 'Email không đúng định dạng !',
            'roles.required' => 'Quyền không được để trống'
        ]);
        $user = User::where('id',$request->id)->first();
        $user->user_name = $request->username;
        $user->email = $request->email;
        $user->save();
        $user->roles()->detach();
        $user->roles()->attach($request->roles);
        return redirect()->route('user.index')->with('message','Sửa thành công !');

    }

    public function destroy($id){
        $user = User::where('id',$id)->first();
        $user->delete();
        $user->roles()->detach();
        return back()->with('message1','Đã xóa quản trị viên');
    }

    public function password(Request $request,$id){
        $user = User::where('id',$id)->first();
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json(['success'=>'Đổi mật khẩu thành công !']);
    }
}
