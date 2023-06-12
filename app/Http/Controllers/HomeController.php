<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::join('categories', 'categories.id', '=', 'posts.category_id')
            ->select('posts.*', 'categories.name as category_name')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->paginate(6);
        return view('frontend.index', compact('posts'));
    }
    public function postDetail($post_slug)
    {
        $post = Post::join('categories', 'categories.id', '=', 'posts.category_id')
            ->select('posts.*', 'categories.name')->where('posts.slug', $post_slug)->first();
        $relatedPost = Post::where('category_id', $post->category_id)->take(3)->get();
        return view('frontend.detail', compact('post', 'relatedPost'));
    }
    public function categoryItem($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        $posts = Post::where('category_id', $category->id)->paginate(9);
        return view('frontend.category_item', compact('posts', 'category'));
    }
}
