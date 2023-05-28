<?php

namespace App\Http\Controllers;

use App\Models\BLog;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function index(){
        return view('blogs.index',[
            'blogs'=>Blog::Latest()->filter(request(['search','category','author']))
                                   ->paginate(5)
                                   ->withQueryString()
        ]);
    }

    public function show(Blog $blog){
        return view('blogs.show',[
            'blog'=>$blog,
            'randomBlogs'=>Blog::inRandomOrder()->take(3)->get()
        ]);
    }

    public function subscriptionHandler(Blog $blog){
        if(auth()->user()->isSubscribed($blog)){
            $blog->unSubscribe();
        }
        else{
            $blog->subscribe(); 
        }

        return back();
    }    
}
