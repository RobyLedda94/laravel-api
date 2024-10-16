<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class ProjectController extends Controller
{
    public function index(){
        // $posts = Post::all();
        // gestione delle pagine, indico che ci saranno 4 post per pagina
        $posts = Post::paginate(9);
        return response()->json([
            'success' => true,
            'results' => $posts
        ]);
    }

    // creo un end point
    public function show($slug)
    {
        $post = Post::with('technologies', 'types')->where('slug', $slug)->get();
        // verifico che il post esista
        if($post){
            return response()->json([
                'success' => true,
                'result' => $post

            ]);
        }

        return response()->json([
            'success' => false,
        ]);
    }
}
