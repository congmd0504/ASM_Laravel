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
                    <a href="#">Danh sách sản phẩm</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Cập nhập sản phẩm</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Cập nhập sản phẩm : {{ $product->name }}</h4>
                            <a href="{{ route('products.index') }}" class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-plus"></i>
                                Danh sách sản phẩm
                            </a>
                        </div>
                    </div>
                    <form action="{{ route('products.update', $product) }}" class="m-3" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body row">
                            <div class="col-6">
                                <label for="name" class=" fw-bold">Tên sản phẩm:</label>
                                <input type="text" name="name" class="form-control mt-2" value="{{ $product->name }}">
                                <label for="price" class=" fw-bold">Gía sản phẩm:</label>
                                <input type="text" name="price" class="form-control mt-2"
                                    value="{{ $product->price }}">
                                <label for="weight" class=" fw-bold">Trọng lượng sản phẩm:</label>
                                <input type="text" name="weight" class="form-control mt-2"
                                    value="{{ $product->weight }}">
                                <label for="quality" class=" fw-bold">Số lượng sản phẩm:</label>
                                <input type="text" name="quality" class="form-control mt-2"
                                    value="{{ $product->quality }}">
                                <label for="title" class=" fw-bold">Danh mục :</label>
                                <select name="category_id" id="" class="form-select">
                                    @foreach ($categories as $cate)
                                        <option value="{{ $cate->id }}"
                                            @if ($product->category->id == $cate->id) selected @endif>{{ $cate->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="description" class=" fw-bold">Mô tả ngắn:</label>
                                <input type="text" name="description" class="form-control mt-2"
                                    value="{{ $product->description }}">
                                <label for="content" class=" fw-bold">Mô tả :</label>
                                <textarea name="content" id="" class="form-control" cols="30" rows="5">{{ $product->content }}</textarea>
                                <div class=" mt-2">
                                    <label for="image" class="fw-bold">Ảnh sản phẩm:</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="file" name="image" class="form-control mt-2">
                                        </div>
                                        <div class="col-6">
                                            @if ($product->image)
                                            <img src="{{ Storage::url($product->image) }}" height="90px" alt="">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mt-4 me-2">
                                <input type="hidden" name="anhcu" value="{{ $product->image }}">
                                <input type="submit" value="Cập nhập" style="width: 100%;" class="btn btn-primary ">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
