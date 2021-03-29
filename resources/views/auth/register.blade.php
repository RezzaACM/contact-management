@extends('layout.main')

@section('title', "Register Contact Management")
    
@section('container')
<section class="register">
    <div class="myBox">
        <div class="form-register">
            <form action={{url('create-user')}} method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="confrm_pass">Confirmation Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="confrm_pass" placeholder="Confirmation Password" required>
                        @if ($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="user_role">User Role</label>
                        <select name="user_role" class="form-control" id="user_role">
                            <option>--Select Role--</option>
                            @foreach ($roles as $row)
                                <option value={{$row->id}}>{{$row->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('user_role'))
                            <span class="text-danger">{{ $errors->first('user_role') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <button class="btn btn-success col-md-12">Register</button>
                        <br>
                        <p class="text-center or-login"><a href={{url('/login')}}>or login here</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
    
@endsection