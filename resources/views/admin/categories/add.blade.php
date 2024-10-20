@extends('admin.home')
@section('content')
    
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Danh mục</h3>
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
                    <a href="#">Danh mục</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Thêm mới danh mục</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ route('categories.store') }}" class="m-3" method="POST">
                        @csrf
                        <label for="name" class="fs-5 fw-bold">Tên danh mục:</label>
                        <input type="text" name="name" class="form-control mt-2" placeholder="Nhập tên danh mục..">
                        <div class="text-end mt-3 me-2">
                            <input type="submit" value="Thêm mới" class="btn btn-success ">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
