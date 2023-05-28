<x-admin-layout>
    <h3 class="text-center">Blogs</h3>
    <div class="card p-3 my-3 shadow-sm">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Blog Title</th>
                    <th scope="col">Blog Intro</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                <tr>
                    <td scope="col"><a href="/blogs/{{$blog->slug}}">{{$blog->title}}</a></td>
                    <td scope="col">{{$blog->intro}}</td>
                    <td scope="col"><a href="/admin/blogs/{{$blog->slug}}/edit" class="btn btn-warning">Edit</a></td>
                    <td scope="col">
                        <form action="/admin/blogs/{{$blog->slug}}/delete" method="POST">
                        @csrf
                        @method('delete')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$blogs->links()}}
    </div>
</x-admin-layout>