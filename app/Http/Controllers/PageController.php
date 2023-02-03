<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        return view('home');
    }

    public function blog(){
        //Consulta a Base de Datos

/*         $posts = Post::get();
        dd($post); */

        $posts = Post::latest()->paginate();

        return view('blog', ['posts' => $posts]);
        }

    public function post(Post $post){
        //Consulta a Base de Datos


        return view('post', ['post' => $post]);
    }
}
