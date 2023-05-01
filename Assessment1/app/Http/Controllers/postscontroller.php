<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
//use Static as GlobalStatics;

class postscontroller extends Controller
{
    public $posts = null;
    public function __construct(){
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $this->posts =json_decode($response);   // ->json().
    }
     public function getAllPost(){
        $response=Http::get('https://jsonplaceholder.typicode.com/posts');
        $this->posts = json_decode($response); // ->json().
        
        return view('About', ['posts'=>$this->posts]);
    }
    public function getById($id){
        foreach($this->posts as $post){
            if($post->id==$id){
                return view('post', ['post'=>$post]);
            }
        }
    }
}
