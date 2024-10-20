@extends('client.index')
@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h2 class="mb-0 text-white">UPDATE INFO</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('updateUser', $user) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 text-center">
                    @if ($user->image)
                        <img src="{{ Storage::url($user->image) }}" alt="User Image" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                    @endif
                </div>

                <div class="mb-3" >
                    <label for="image" class="form-label">Image</label>
                    <input type="file"  id="image" class="form-control" name="image">
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">User Name</label>
                    <input type="text" name="username" class="form-control" style="color: black" id="username" placeholder="Enter your username.." value="{{ $user->username }}">
                </div>

                <div class="mb-3">
                    <label for="fullname" class="form-label">Full Name</label>
                    <input type="text" name="fullname" class="form-control" style="color: black" id="fullname" placeholder="Enter your fullname.." value="{{ $user->fullname }}">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" style="color: black" id="email" placeholder="Enter your email.." value="{{ $user->email }}">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
