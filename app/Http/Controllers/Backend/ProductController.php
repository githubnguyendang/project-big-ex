<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    if ($request->search){
        $pro = Product::where('pro_name','like','%'.$request->search.'%')->simplePaginate(10);
        return view('back-end.page.product.list',compact('pro'));
    }
    if ($request->order_by){
        switch ($request->order_by){
            case 'new':
                $pro = DB::table('products')->join('category','products.pro_cate','=','category.cate_id')->orderBy('pro_id','DESC')->simplePaginate(10);
                break;
            case 'old':
                $pro = DB::table('products')->join('category','products.pro_cate','=','category.cate_id')->orderBy('pro_id','ASC')->simplePaginate(10);
                break;
            case 'price_max':
                $pro = DB::table('products')->join('category','products.pro_cate','=','category.cate_id')->orderBy('pro_price','ASC')->simplePaginate(10);
                break;
            case 'price_min':
                $pro = DB::table('products')->join('category','products.pro_cate','=','category.cate_id')->orderBy('pro_price','DESC')->simplePaginate(10);
                break;
            case 'view':
                $pro = DB::table('products')->join('category','products.pro_cate','=','category.cate_id')->orderBy('views','DESC')->simplePaginate(10);
                break;
            case 'order':
                $pro = DB::table('products')->join('category','products.pro_cate','=','category.cate_id')->orderBy('pro_done','DESC')->simplePaginate(10);
                break;
        }
    }else{
        $pro = DB::table('products')->join('category','products.pro_cate','=','category.cate_id')->orderBy('pro_id','DESC')->simplePaginate(10);
    }
        return view('back-end.page.product.list',compact('pro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = Category::all();
        return view('back-end.page.product.addProduct',compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $filename = $request->fileToUpload->getClientOriginalName();
        if ($request->fileToUploads){
            if ($pro = Product::create([
                'pro_cate' => $request->category,
                'pro_name' => $request->proName,
                'pro_author' => $request->author,
                'pro_slug' => Str::slug($request->proName),
                'pro_description' => $request->description,
                'pro_sdescription' => $request->sdescription,
                'pro_price' => $request->pro_price,
                'pro_sale' => $request->pro_sale,
                'pro_thumbnail' => $filename,
                'status' => $request->status,
            ])){
                    foreach ($request->fileToUploads as $value){
                    $filenames = $value->getClientOriginalName();
                    $value->move('acess/upload/product/libiry',$filenames);
                    $image = Image::create([
                        'pro_image' => $pro->pro_id,
                        'image' => $filenames,
                    ]);
                }
                $request->file('fileToUpload')->move('acess/upload/product',$filename);
            };
        }else{
            $pro = new Product();
            $pro->pro_cate = $request->category;
            $pro->pro_name = $request->proName;
            $pro->pro_slug = Str::slug($request->proName);
            $pro->pro_description = $request->description;
            $pro->pro_sdescription = $request->sdescription;
            $pro->pro_price = $request->pro_price;
            $pro->pro_sale = $request->pro_sale;
            $pro->pro_author = $request->author;
            $filename = $request->fileToUpload->getClientOriginalName();
            $pro->pro_thumbnail = $filename;
            $pro->status = $request->status;
            $pro->save();
            $request->file('fileToUpload')->move('acess/upload/product',$filename);
        }
        return redirect(route('product.index'))->with('message','Thêm sản phẩm thành công !');

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
        $pro = Product::find($id);
        $cate = Category::all();
        return view('back-end.page.product.editProduct',compact('pro','cate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request)
    {
        $pro = Product::find($request->id);
        $pro->pro_cate = $request->category;
        $pro->pro_name = $request->proName;
        $pro->pro_slug = Str::slug($request->proName);
        $pro->pro_description = $request->description;
        $pro->pro_sdescription = $request->sdescription;
        $pro->pro_price = $request->pro_price;
        $pro->pro_sale = $request->pro_sale;
        $pro->pro_author = $request->author;
        $pro->status = $request->status;
        if (!empty($request->fileToUpload)){
            $filename = $request->fileToUpload->getClientOriginalName();
            $pro->pro_thumbnail = $filename;
            $request->file('fileToUpload')->move('acess/upload/product',$filename);
        }
        else {
            $pro->pro_thumbnail = $request->thumbnail;
        }
        if ($request->fileToUploads) {
            $image = Image::where('pro_image',$pro->pro_id);
            $image->delete();
            foreach ($request->fileToUploads as $value){
                $filenames = $value->getClientOriginalName();

                $value->move('acess/upload/product/libiry',$filenames);
                $image = Image::create([
                    'pro_image' => $pro->pro_id,
                    'image' => $filenames,
                ]);
            }
        }
        $pro->save();
        return redirect(route('product.index'))->with('message','Sửa sản phẩm thành công !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro = Product::find($id);
        $pro->delete();
        return back()->with('message','Xóa sản phẩm thành công !');
    }
}
