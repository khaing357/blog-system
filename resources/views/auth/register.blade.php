<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h3 class="text-primary text-center my-2"> Register Form</h3>
                <div class="card p-4 my-3 shadow-sm">
                    <form method="POST" action="/register">
                    @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input required name="name" type="text" class="form-control" value="{{old('name')}}"/>
                    </div>
                    <x-error name="name"/>

                    <div class="mb-3">
                      <label for="username" class="form-label">UserName</label>
                      <input required name="username" type="text" class="form-control" value="{{old('username')}}"/>
                    </div>
                    <x-error name="username"/>

                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input  required name="email" type="email" class="form-control" value="{{old('email')}}"/>
                    </div>
                    <x-error name="email"/>

                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input required name="password" type="password" class="form-control"/>
                    </div>
                    <x-error name="password"/>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>