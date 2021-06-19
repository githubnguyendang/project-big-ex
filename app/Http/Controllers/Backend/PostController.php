<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Str;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search){
            $post = Post::where('title','like','%'.$request->search.'%')->simplePaginate(10);
            return view('back-end.page.post.listPost',compact('post'));
        }
        if($request->order_by){
            switch ($request->order_by){
                case 'new':
                    $post = Post::orderBy('post_id','DESC')->simplePaginate(10);
                    break;
                case 'old':
                    $post = Post::orderBy('post_id','ASC')->simplePaginate(10);
                    break;
                case 'view':
                    $post = Post::orderBy('views','DESC')->simplePaginate(10);
                    break;
            }
        }
        else{
            $post = Post::orderBy('post_id','DESC')->simplePaginate(10);
        }
        return view('back-end.page.post.listPost',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.page.post.addPost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->content = $request->noidung;
        $filename = $request->fileToUpload->getClientOriginalName();
        $post->thumbnail = $filename;
        $post->status = $request->status;
        $post->save();
        $request->file('fileToUpload')->move('acess/upload/post',$filename);
        return back()->with('message','Thêm bài viết thành công !');
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
        $post = Post::where('post_id',$id)->first();
        return view('back-end.page.post.editPost',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request)
    {
        $post = Post::where('post_id',$request->id)->first();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->content = $request->noidung;
        $post->status = $request->status;
        if($request->fileToUpload) {
            $filename = $request->fileToUpload->getClientOriginalName();
            $post->thumbnail = $filename;
            $request->file('fileToUpload')->move('acess/upload/post',$filename);
        }else{
            $post->thumbnail = $request->thumbnai_old;
        }
        $post->save();
        return redirect()->route('Post.index')->with('message','Sửa bài viết thành công !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return back()->with('message','Xóa bài viết thành công !');
    }
}
