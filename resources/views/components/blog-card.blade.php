@props(['blog'])
<div class="card">
    <img
      src="/storage/{{$blog->thumbnail}}"
      class="card-img-top"
      alt="..." width="100" height="200"
    />
     <div class="card-body">
        <h3 class="card-title">{{$blog->title}}</h3>
        <p class="fs-6 text-secondary">
            Author-<a href="/?author={{$blog->author->username}}">{{$blog->author->name}}</a>
            <span> - {{$blog->created_at->diffForHumans()}}</span>
        </p>
        <div class="tags my-3">
            <a href="/?category={{$blog->category->name}}"><span class="badge bg-primary">{{$blog->category->name}}</span></a>
        </div>
            <p class="card-text">
                {{$blog->intro}}
            </p>
            <a href="/blogs/{{$blog->slug}}" class="btn btn-primary">Read More</a>
    </div>
</div>