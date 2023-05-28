<x-admin-layout>
    <h3 class="my-3 text-center">Blog Create Form</h3>
        <div class="card p-3 my-3 shadow-sm">
            <form action="/admin/blogs/store" method="POST" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title"/>
            <x-form.input name="slug"/>
            <x-form.input name="intro"/>
            <x-form.textarea name="body"/>
            
            <x-form.input-wrapper>
                <x-form.label name="thumbnail" />
                <input 
                    type="file"
                    class="form-control"
                    name="thumbnail">
                <x-error name="thumbnail" />
            </x-form.input-wrapper>
            
            <x-form.input-wrapper>
                <x-form.label name="category"/>
                <select name="category_id"  class="form-control">
                @foreach($categories as $category)
                    <option {{$category->id==old('category_id') ? 'selected' : '' }} value="{{$category->id}}">{{$category->name}}</option>
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