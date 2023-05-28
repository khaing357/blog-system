<x-admin-layout>
    <h3 class="my-3 text-center">Blog Edit Form</h3>
        <div class="card p-3 my-3 shadow-sm">
            <form action="/admin/blogs/{{$blog->slug}}/update" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <x-form.input name="title" value="{{$blog->title}}"/>
            <x-form.input name="slug" value="{{$blog->slug}}" />
            <x-form.input name="intro" value="{{$blog->intro}}" />
            <x-form.textarea name="body" value="{{$blog->body}}"/>
        
            <x-form.input-wrapper>
                <x-form.label name="thumbnail" />
                <input 
                    type="file"
                    class="form-control"
                    name="thumbnail">
                <x-error name="thumbnail" />
            </x-form.input-wrapper>
            <img src="/storage/{{$blog->thumbnail}}" width="50" height="50" alt="img" />

            <x-form.input-wrapper>
                <x-form.label name="category"/>
                <select name="category_id"  class="form-control">
                @foreach($categories as $category)
                    <option {{$category->id==old('category_id',$blog->category->id) ? 'selected' : '' }} value="{{$category->id}}">{{$category->name}}</option>
                @endforeach  
                </select>
                <x-error name="category_id" />
            </x-form.input-wrapper>
            
            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
</x-admin-layout>