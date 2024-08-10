<?php

namespace App\Http\Controllers;

use App\Http\Services\post\postService;
use App\Http\Services\product\productService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $post = '';
    protected $product = '';
    public function __construct(postService $post, productService $product)
    {
        $this->post = $post;
        $this->product = $product;
    }

    public function index(Request $request)
    {
        $text = $request->input('tin_tuc');
        $searchTitle = $text != '' ? 'kết quả tìm kiếm' : 'tin tức';
        return view('blogs.post', [
            'title' => 'Gia Phú - trang tin tức',
            'name' => 'tin tức',
            'searchTitle' => $searchTitle,
            'posts' => $this->post->getPublic($text),
            'products' =>  $this->product->getPublic(4),
            'menu' => 0
        ]);
    }

    public function post($slug)
    {
        $post = $this->post->detail($slug);
        if (!$post) redirect()->back();

        return view('blogs.detail', [
            'title' => 'Tin tức -' . $post->title,
            'name' => $post->title,
            'post' => $post,
            'products' =>  $this->product->getPublic(4),
            'menu' => 0
        ]);
    }
}