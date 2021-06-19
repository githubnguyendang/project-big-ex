<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Key_word;

class KeywordController extends Controller
{
    public function index(Request $request){
        if ($request->search){
            $keyword = Key_word::where('key_name','like','%'.$request->search.'%')->simplePaginate(10);
            return view('back-end.page.keyword',compact('keyword'));
        }
        if ($request->order_by){
            switch ($request->order_by){
                case 'max':
                    $keyword = Key_word::orderBy('views','DESC')->simplePaginate(10);
                    break;
                case 'min':
                    $keyword = Key_word::orderBy('views','ASC')->simplePaginate(10);
                    break;
            }
        }else{
            $keyword = Key_word::orderBy('views','DESC')->simplePaginate(10);
        }
        return view('back-end.page.keyword',compact('keyword'));
    }
}
