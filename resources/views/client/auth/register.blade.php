@extends('client.index')
@section('content')
    <div  class="login-container">
        <h2 class="text-center mb-4">Register</h2>
        <form action="{{route('postRegister')}}" method="POST" >
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
            </div>
            <div class="mb-3">
                <label for="confirmpassword" class="form-label">Confirm Password</label>
                <input type="password" name="confirmPassword" class="form-control" id="confirmpassword" placeholder="Enter your confirm password">
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-login btn-block">Register</button>
            </div>
            <div class="text-center mt-3">
                <a href="#">Forgot Your Password?</a>
            </div>
        </form>
    </div>
@endsection
