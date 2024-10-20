@extends('client.index')
@section('content')
    <div  class="login-container">
        <h2 class="text-center mb-4">Forget Password</h2>
        <form action="{{route('postForgetPass')}}" method="POST" >
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email đã đăng ký</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-login btn-block">Submit</button>
            </div>
            <div class="text-center mt-3">
                <a href="#">Forgot Your Password?</a>
            </div>
        </form>
    </div>
@endsection
