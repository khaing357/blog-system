@props(['blog'])
<section class="container">
      <div class="col-md-8 mx-auto">
      @auth
        <div class="card p-3 my-3 shadow-sm">
          <form action="/blogs/{{$blog->slug}}/comments" method="POST">
          @csrf
            <div class="mb-3">
              <textarea
              required 
              name="body"
              id=""
              class="form-control border border-0"
              cols="10"
              rows="5"
              placeholders="say something..">
              </textarea>
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        <x-error name="body"/>
        </div>
      @else
       <p class="text-center">Please <a href="/login">Login</a> to participate in this discussion.</p>
      @endauth
      </div>
    </section>