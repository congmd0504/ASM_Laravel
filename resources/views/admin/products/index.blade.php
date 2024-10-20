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
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Danh sách sản phẩm</h4>
                            <a href="{{ route('products.create') }}" class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-plus"></i>
                                Thêm mới sản phẩm
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>TÊN SẢN PHẨM</th>
                                    <th>GÍA SẢN PHẨM</th>
                                    <th>SỐ LƯỢNG</th>
                                    <th>HÌNH ẢNH</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $index => $product)
                                    <tr class="text-center">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ number_format($product->price) }} VNĐ</td>
                                        <td>{{ $product->quality }}</td>
                                        <td>
                                            @if ($product->image)
                                                <img src="{{ Storage::url($product->image) }}" height="50px"
                                                    alt="">
                                            @endif
                                        </td>
                                        <td>
                                            <div class="form-button-action ">
                                                <a href="{{ route('products.show', $product) }}" title="Chi tiết"
                                                    class="btn btn-link btn-primary ">
                                                    <i class="fa fa-exclamation"></i>
                                                </a><span class="mt-2">|</span>
                                                <a href="{{ route('products.edit', $product) }}" title="Sửa"
                                                    class="btn btn-link btn-primary ">
                                                    <i class="fa fa-edit"></i>
                                                </a><span class="mt-2">|</span>
                                                <form action="{{ route('products.destroy', $product) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Bạn có muốn xóa không ?')"
                                                        type="submit" title="Xóa" class="btn btn-link btn-danger">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{$products->links()}}
    @endsection
