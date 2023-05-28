<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Blog;
use App\Models\Category;


class AdminController extends Controller
{
    public function index(){
        return  view('admin.blogs.index',[
            'blogs'=>Blog::Latest()->paginate(6)
        ]);
    }

    public function create(){
        return view('admin.blogs.create',[
            'categories'=>Category::all()
        ]);
    }

    public function store(){
        $formData=request()->validate([
            'title'=>['required'],
            'slug'=>['required', Rule::unique('blogs','slug')],
            'intro'=>['required'],
            'body'=>['required'],
            'category_id'=>['required',Rule::exists('categories','id')]
        ]);
      $formData['user_id']=auth()->user()->id;
      $formData['thumbnail']=request()->file('thumbnail')->store('thumbnails');
      Blog::create($formData);

      return redirect('/');
    }

    public function edit(Blog $blog){
        return view('admin.blogs.edit',[
            'blog'=>$blog,
            'categories'=>Category::all()
        ]);
    }

    public function update(Blog $blog){
        $formData=request()->validate([
            'title'=>['required'],
            'slug'=>['required', Rule::unique('blogs','slug')->ignore($blog->id)],
            'intro'=>['required'],
            'body'=>['required'],
            'category_id'=>['required',Rule::exists('categories','id')]
        ]);
      $formData['user_id']=auth()->user()->id;
      $formData['thumbnail']=request()->file('thumbnail')? request()->file('thumbnail')->store('thumbnails') : $blog->thumbnail;
      $blog->update($formData);

      return redirect('/admin/blogs');
    }

    public function destroy(Blog $blog){
        $blog->delete();
        return back();

    }
}
