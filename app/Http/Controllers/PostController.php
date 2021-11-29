<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        return Inertia::render('Posts/Index', [
            'filters' => Request::all('leita', 'flokkur', 'höfundur'),
            'tags' => Tag::all(),
            'posts' => Post::with(['tags', 'images'])
                ->orderBy('created_at')
                ->filter(Request::only('leita', 'flokkur', 'höfundur'))
                ->paginate(12)
                ->withQueryString()
                ->through(fn ($post) => [
                        'slug' => $post->slug,
                        'title' => $post->title,
                        'author' => $post->author,
                        'created_at' => $post->created_at,
                        'content' => $post->content,
                        'img_url' => $post->img_url,
                        'tags' => $post->tags,
                        'image' => $post->images[0]
                ])
        ]);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->with('author')->with(['tags', 'images'])->firstOrFail();

        return Inertia::render('Posts/Show', [
            'post' => $post
        ]);
    }
}
