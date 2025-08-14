<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BeritaController extends Controller
{
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('berita.show', compact('post'));
    }
}
