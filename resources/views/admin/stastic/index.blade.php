@extends('admin.home')
@section('content')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">ADMIM</h3>
                <h6 class="op-7 mb-2">THỐNG KÊ DỮ LIỆU</h6>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a href="#" class="btn btn-primary btn-round">Add Customer</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fa fa-folder"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Tổng sản phẩm</p>
                                    <h4 class="card-title">{{ $totalProduct }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-info bubble-shadow-small">
                                    <i class="fas fa-user-check"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Tổng user</p>
                                    <h4 class="card-title">{{ $totalUser }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="fas fa-luggage-cart"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Tổng view</p>
                                    <h4 class="card-title">{{$sumView}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                    <i class="far fa-check-circle"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Bình luận</p>
                                    <h4 class="card-title">{{$totaLCommnent}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <div class="card-title">Thống kê danh mục</div>
                            <div class="card-tools">
                                <div class="dropdown">
                                    <button class="btn btn-icon btn-clean me-0" type="button" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center mb-0">
                                <thead class="thead-light">
                                    <tr >
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên danh mục</th>
                                        <th scope="col">Số sản phẩm</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productByCate as $index => $cate)
                                        @if ($cate->id == 1)
                                            <tr class="text-center">
                                                <th scope="row">
                                                    {{ $index + 1 }}
                                                </th>
                                                <td>{{ $cate->name }}</td>
                                                <td>{{ $totalProduct }} sản phẩm </td>
                                                <td>
                                                    <a title="Chi tiết" href="{{route('products.index')}}" class="btn btn-info"><i
                                                        class="fa fa-folder-open"></i>
                                                </a>
                                                </td>
                                                @continue
                                            </tr>
                                        @endif
                                        <tr class="text-center">
                                            <th scope="row">
                                                {{ $index + 1 }}
                                            </th>
                                            <td>{{ $cate->name }}</td>
                                            <td>{{ $cate->products_count }} sản phẩm </td>
                                            <td>
                                                <a title="Chi tiết" href="{{route('admin.productByCate',$cate->id)}}" class="btn btn-info"><i
                                                        class="fa fa-folder-open"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">

                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <div class="card-title">Top 10 sản phẩm view cao nhất</div>
                            <div class="card-tools">
                                <div class="dropdown">
                                    <button class="btn btn-icon btn-clean me-0" type="button" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center mb-0">
                                <thead class="thead-light">
                                    <tr class="text-center">
                                        <th scope="col">STT</th>
                                        <th scope="col" >TÊN SẢN PHẨM</th>
                                        <th scope="col" >ẢNH</th>
                                        <th scope="col" >VIEW</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productView as $index =>$product)
                                    <tr class="text-center">
                                        <th scope="row">
                                        {{$index+1}}
                                        </th>
                                        <td >{{$product->name}}</td>
                                        <td ><img src="{{Storage::url($product->image)}}" height="50px" alt=""></td>
                                        <td >
                                            {{$product->view}}
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
