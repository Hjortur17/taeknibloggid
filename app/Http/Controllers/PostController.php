<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index() {
        return Inertia::render('Posts/Index', [
            'posts' => Post::query()
                    ->when(Request::input('leita'), function ($query, $search) {
                        $query->where('title', 'like', "%{$search}%");
                    })
                    ->with('tags')
                    ->get()
                    ->transform(function ($post) {
                        return [
                            'slug' => $post->slug,
                            'title' => $post->title,
                            'author' => $post->author,
                            'created_at' => $post->created_at,
                            'content' => $post->content,
                            'img_url' => $post->img_url,
                            'tags' => $post->tags
                        ];
                    }),
            'tags' => Tag::all(),
            'filters' => Request::only(['search'])
        ]);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->with('author')->with('tags')->firstOrFail();

        return Inertia::render('Posts/Show', [
            'post' => $post
        ]);
    }
}