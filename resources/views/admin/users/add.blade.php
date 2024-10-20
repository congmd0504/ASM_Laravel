@extends('admin.home')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Khách hàng</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Khách hàng</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Thêm mới user</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ route('admin.postUser') }}" class="m-3" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label for="username" class=" fw-bold">User Name:</label>
                                <input type="text" name="username" class="form-control mt-2"
                                    placeholder="Enter your username..">
                                <label for="email" class=" fw-bold">Email :</label>
                                <input type="email" name="email" class="form-control mt-2"
                                    placeholder="Enter your email..">
                                <label for="password" class=" fw-bold">Password :</label>
                                <input type="password" name="password" class="form-control mt-2"
                                    placeholder="Enter your password..">
                                <label for="confirmpass" class=" fw-bold">Confirm Password :</label>
                                <input type="password" name="confirmpass" class="form-control mt-2"
                                    placeholder="Enter your confirm password..">

                            </div>
                            <div class="col-6">
                                <label for="fullname" class=" fw-bold">Full Name :</label>
                                <input type="text" name="fullname" class="form-control mt-2"
                                    placeholder="Enter your full name..">
                                <label for="image" class=" fw-bold">Image:</label>
                                <input type="file" name="image" class="form-control mt-2">
                                <label for="content" class="mt-2 fw-bold">Role :</label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" value="user" type="radio" name="role" id="flexRadioDefault1"
                                            checked>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            User
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" value="admin" type="radio" name="role"
                                            id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Admin
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end mt-4 me-2">
                            <input type="submit" value="Thêm mới" style="width: 100%;" class="btn btn-success ">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
