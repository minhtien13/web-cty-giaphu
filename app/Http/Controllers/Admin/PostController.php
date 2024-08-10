<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostFormRequest;
use App\Http\Services\post\postService;
use App\Models\c;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{

    protected $post = '';

    public function __construct(postService $post)
    {
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.list', [
            'title' => 'Danh sách bài viết',
            'posts' => $this->post->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.add', [
            'title' => 'Tạo bài viết cho trang tin tức'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        $this->post->insert($request);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'title' => 'cập nhật bài viết: ' . $post->title,
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $request, Post $post)
    {

        $result = $this->post->update($post, $request);
        if($result) {
            Session::flash('success', 'Đã cấp nhật bài viết thành công');
            return redirect('/admin/post/list');
        }

        Session::flash('error', 'Thực thiện cấp nhật bài viết không thành công');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $post = $this->post->remove($request);
        return $post ?
               response()->json(['error' => false, 'message' => 'Đã thực hiện xóa bài viết thành công'], 200) :
               response()->json(['error' => true, 'message' => 'Thực hiện xóa bài viết không thành công'], 500);
    }
}