<x-layout>
    <!-- singloe blog section -->
    <div class="container">
      <div class="row mt-5">
        <div class="col-md-6 mx-auto text-center">
          <img
            src="/storage/{{$blog->thumbnail}}"
            class="card-img-top"
            alt="..."
            width="100"
            height="200"
          />
          <h3 class="my-3">{{$blog->title}}</h3>
          <div>
            <div><a href="/?author={{$blog->author->username}}">Author-{{$blog->author->name}}</a></div>
            <div><a href="/?category={{$blog->category->slug}}"><span class="badge bg-secondary">
            {{$blog->category->name}}</span></a></div>
            <div class="text-secondary">{{$blog->created_at->diffForHumans()}}</div>
            @auth
            <form action="/blogs/{{$blog->slug}}/subscription" method="POST">
            @csrf
            @if(auth()->user()->isSubscribed($blog))
              <button class="btn btn-danger">Unsubscribe</button>
            @else
              <button class="btn btn-warning">Subscribe</button>
            @endif
          </form>
          @endauth
          <p class="lh-md mt-3">
            {{ $blog->body }}
          </p>
        </div>
      </div>
    </div>
    <x-comment-form :blog="$blog" />
    @if($blog->comments->count())
    <x-comments :comments="$blog->comments()->latest()->paginate(3)"/>
    @endif
    <x-blogs_you_may_like_section :randomBlogs="$randomBlogs"/>
</x-layout>

