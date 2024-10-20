@extends('client.index')
@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Shop</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Shop</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-9">
                            <h2 class="mb-4">Fresh fruits shop </h2>
                        </div>
                        <div class="col-xl-3">
                            <form action="{{route('client.shop.name')}}" method="POST" class="input-group w-100 mx-auto d-flex">
                                @csrf
                                <input type="text" name="name" class="form-control p-3" placeholder="keywords"
                                    aria-describedby="search-icon-1">
                                <button type="submitq" id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></button>
                            </form>
                        </div>

                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                                @include('client.layouts.category-shop')
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row g-4 justify-content-center">
                                @if (count($products) == 0)
                                    <div style="width: 100%; height: 300px;"
                                        class="d-flex align-items-center justify-content-center">
                                        <h2 class="text-danger">Đã hết hàng !</h2>
                                    </div>
                                @else
                                    @foreach ($products as $product)
                                        <div class="col-md-6 col-lg-6 col-xl-4">
                                            <a href="{{route('client.shopDetail',$product->id)}}"
                                                class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="{{ Storage::url($product->image) }}" style="height: 200px;"
                                                        class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                    style="top: 10px; left: 10px;">{{ $product->category->name }}</div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>{{ $product->name }}</h4>
                                                    <p>{{ $product->description }}</p>
                                                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">
                                                            {{ number_format($product->price) }} vnđ
                                                        </p>
                                                        <form action="{{ route('client.cart') }}" method="POST" class="mb-0">
                                                            @csrf
                                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                            <input type="hidden" name="quantity" value="1">
                                                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                                            <button type="submit" class="btn border border-secondary rounded-pill px-4 py-2 text-primary">
                                                                <i class="fa fa-shopping-bag me-2 text-primary"></i> Add
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->
@endsection
