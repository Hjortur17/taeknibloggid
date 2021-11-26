<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Post;

class PageController extends Controller
{
    public function index() {
        return Inertia::render('Sites/Index', [
            'posts' => Post::with(['tags', 'images'])
                    ->orderByDesc('created_at')
                    ->take(6)
                    ->get()
                    ->transform(function ($post) {
                            return [
                                'slug' => $post->slug,
                                'title' => $post->title,
                                'author' => $post->author,
                                'created_at' => $post->created_at,
                                'content' => $post->content,
                                'tags' => $post->tags,
                                'image' => $post->images[0]
                            ];
                        })
        ]);
    }

    public function about() {
        return Inertia::render('Sites/About');
    }
}
