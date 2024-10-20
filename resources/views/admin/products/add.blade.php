@extends('admin.home')
@section('content')
  
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Sản phẩm</h3>
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
                    <a href="#">Sản phẩm</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Thêm mới sản phẩm</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ route('products.store') }}" class="m-3" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label for="name" class=" fw-bold">Tên sản phẩm:</label>
                                <input type="text" name="name" class="form-control mt-2"
                                    placeholder="Nhập tên tên sản phẩm..">
                                <label for="price" class=" fw-bold">Gía sản phẩm (vnđ) :</label>
                                <input type="text" name="price" class="form-control mt-2"
                                    placeholder="Nhập giá sản phẩm..">
                                <label for="weight" class=" fw-bold">Trọng lượng sản phẩm (g):</label>
                                <input type="text" name="weight" class="form-control mt-2"
                                    placeholder="Nhập trọng lượng sản phẩm..">
                                <label for="quality" class=" fw-bold">Số lượng sản phẩm:</label>
                                <input type="text" name="quality" class="form-control mt-2"
                                    placeholder="Nhập tên tên sản phẩm..">
                                <label for="image" class=" fw-bold">Ảnh sản phẩm:</label>
                                <input type="file" name="image" class="form-control mt-2">

                            </div>
                            <div class="col-6">
                                <label for="description" class=" fw-bold">Mô tả ngắn:</label>
                                <input type="text" name="description" class="form-control mt-2"
                                    placeholder="Nhập tên tên sản phẩm..">
                                <label for="content" class=" fw-bold">Mô tả :</label>
                                <textarea name="content" id="" class="form-control" cols="30" rows="5"></textarea>
                                <label for="title" class=" fw-bold">Danh mục :</label>
                                <select name="category_id" id="" class="form-select">
                                    @foreach ($categories as $cate)
                                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                    @endforeach
                                </select>
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
