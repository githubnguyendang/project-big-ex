<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CodeSale;
use App\Http\Requests\CodeSaleRequest;
use App\Http\Requests\UpdateCodeSaleRequest;

class CodeSaleController extends Controller
{
    public function index(){
        $code = CodeSale::orderBy('code_id','DESC')->simplePaginate(10);
    return view('back-end.page.codeSale.index',compact('code'));
    }
    public function store(CodeSaleRequest $request){
        $code = new CodeSale();
        $code->code_name = $request->codename;
        $code->code_value = $request->value;
        $code->code_status = $request->codestatus;
        $code->save();
        return back()->with('message','Thêm mã giảm giá thành công !');
    }
    public function edit($id){
        $code = CodeSale::find($id)->first();
        return view('back-end.page.codeSale.edit',compact('code'));
    }
    public function update(UpdateCodeSaleRequest $request){
    $code = CodeSale::find($request->id);
        $code->code_name = $request->codename;
        $code->code_value = $request->value;
        $code->code_status = $request->codestatus;
        $code->save();
        return redirect()->route('Code.index')->with('message1','Sửa mã giảm giá thành công !');
    }
    public function destroy($id){
        $code = CodeSale::find($id);
        $code->delete();
        return back()->with('message1','Xóa mã giảm giá thành công !');
    }
}
