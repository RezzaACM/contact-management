@extends('layout.main')

@section('title', "Login Contact Management")
    
@section('container')
    <section class="loginPage">
        <div class="myBox">
            <h2 class="text-center mt-3">Login</h2>
            <div class="form-login">
                <form action={{url('/authenticate')}} method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="email">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-success col-md-12">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection