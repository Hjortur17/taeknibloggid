<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Post;

class PageController extends Controller
{
    public function index() {
        return Inertia::render('Sites/Index', [
            'posts' => Post::with('tags')
                    ->take(5)
                    ->get()
                    ->sortBy('updated_at')
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
                    })
        ]);
    }

    public function about() {
        return Inertia::render('Sites/About');
    }
}
