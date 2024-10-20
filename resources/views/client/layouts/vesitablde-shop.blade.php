<div class="container py-5">
    <h1 class="mb-0">Fresh Organic Vegetables</h1>
    <div class="owl-carousel vegetable-carousel justify-content-center">
        @foreach ($allProduct as $product)
            <div class="border border-primary rounded position-relative vesitable-item">
                <a href="{{route('client.shopDetail',$product->id)}}">
                    <div class="vesitable-img">
                        <img src="{{ Storage::url($product->image) }}" style="height: 200px" class="img-fluid w-100 rounded-top"
                            alt="">
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                        style="top: 10px; right: 10px;">{{ $product->category->name }}</div>
                    <div class="p-4 rounded-bottom">
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
    </div>
</div>
