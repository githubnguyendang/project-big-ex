<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::get();
        return view('back-end.page.slider.listSlider',compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.page.slider.addSlider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $slider = new Slider();
        $slider->name = $request->name;
//        Lấy tên file
        $filename = $request->fileToUpload->getClientOriginalName();
//        Lấy tên file nhưng không gồm tên mở rộng
        $file = pathinfo($filename, PATHINFO_FILENAME);
//        Lấy tên mở rộng của file
        $array = explode('.', $filename);
        $extension = end($array);

        $slider->image = $filename;
        $slider->status = $request->status;
        $slider->save();
        $request->file('fileToUpload')->move('acess/upload/slider',$filename);
        return redirect(route('Slider.index'))->with('message','Thêm Slider thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('back-end.page.slider.editSlider',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $slider = Slider::find($request->id);
        $slider->name = $request->name;
        if (!empty($request->fileToUpload)){
            $filename = $request->fileToUpload->getClientOriginalName();
            $slider->image = $filename;
            $request->file('fileToUpload')->move('acess/upload/slider',$filename);
        }
        else {
            $slider->image = $request->slider_old;
        }
        $slider->status = $request->status;
        $slider->save();

        return back()->with('message','Sửa Slider thành công !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $slider = Slider::find($id);
     $slider->delete();
    return back()->with('message','Xóa Slider thành công !');
    }
}
