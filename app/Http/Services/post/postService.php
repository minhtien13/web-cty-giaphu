<?php

namespace App\Http\Services\post;

use App\Models\Post;
use Illuminate\Support\Facades\Session;

class postService
{
    public function insert($request)
    {
        try {
            $posts = [
                'title' => $request->input('title'),
                'thumb' => $request->input('thumb'),
                'is_status' => $request->input('is_status'),
                'is_link' =>  $this->checkUrl($request->input('title')),
                'description' => $request->input('description'),
                'content' => $request->input('content'),
            ];

            $result = Post::create($posts);
            if($result) {
                Session::flash('success', 'Đã tạo bài viết tin tức thành công');
                return true;
            }

            Session::flash('error', 'Tạo bài viết tin tức không thành công');
            return false;
        } catch (\Exception $error) {
            Session::flash('error', 'Tạo bài viết tin tức không thành công');
        }
    }

    public function get()
    {
        return Post::orderByDesc('id')->paginate(20);
    }

    public function checkUrl($link)
    {
        $is_link = \Str::slug($link);
        $post = Post::where('is_link', $is_link)->first();
        if ($post) $is_link .= '-' . time();

        return $is_link;
    }

    public function update($post, $request)
    {
        try {
            $title =  $request->input('title');

            $data = [
                'title' => $request->input('title'),
                'thumb' => $request->input('thumb'),
                'is_status' => $request->input('is_status'),
                'is_link' =>  $request->input('is_link'),
                'description' => $request->input('description'),
                'content' => $request->input('content'),
            ];

            // check link event change title to link
            if ($post->title != $title) {
                $data['is_link'] = $this->checkUrl($title);
            }

            $post->fill($data);
            $post->save();
            return true;
        } catch (\Exception $e) {
                return false;
        }
    }

    public function remove($request)
    {
        $postID = (int)$request->input("id");

        $result = Post::where("id", $postID)->first();

        if ($result) {
            Post::where("id", $postID)->delete();
            return true;
        }

        return false;
    }

    // ShowUp page post
    public function getPublic($postTitle = '')
    {
        return Post::orderByDesc('id')
                   ->where('is_status', 1)
                   ->where('title', 'LIKE', '%' . $postTitle . '%')
                   ->select('title', 'thumb', 'description', 'is_link')
                   ->paginate(10);
    }

    public function detail($link)
    {
        return Post::where('is_status', 1)
                   ->where('is_link', $link)
                   ->select('title', 'thumb', 'description', 'content')
                   ->first();
    }
}