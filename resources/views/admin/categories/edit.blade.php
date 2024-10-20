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
                    <a href="#">Sửa danh mục: {{ $category->name }}</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ route('categories.update', $category->id) }}" class="m-3" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="name" class="fs-5 fw-bold">Tên danh mục:</label>
                        <input type="text" name="name" class="form-control mt-2" placeholder="Nhập tên danh mục.."
                            value="{{ $category->name }}">
                        <div class="text-end mt-3 me-2">
                            <input type="submit" value="Cập nhập" class="btn btn-primary ">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
