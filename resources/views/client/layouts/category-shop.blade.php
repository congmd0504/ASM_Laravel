<div class="col-lg-12">
    <div class="mb-3">
        <h4>Categories</h4>
        <ul class="list-unstyled fruite-categorie">
            @foreach ($categories as $cate)
                @if ($cate->id == 1)
                    <li>
                        <div class="d-flex justify-content-between fruite-name">
                            <a href="{{ route('client.shop') }}"><i
                                    class="fas fa-apple-alt me-2"></i>{{ $cate->name }}</a>
                        </div>
                    </li>
                    @continue
                @endif
                <li>
                    <div class="d-flex justify-content-between fruite-name">
                        <a href="{{route('client.shop.id',$cate->id)}}"><i
                                class="fas fa-apple-alt me-2"></i>{{ $cate->name }}</a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="col-lg-12">
    <div class="mb-3">
        <h4 class="mb-2">Price</h4>
        <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput" min="0" max="500"
            value="0" oninput="amount.value=rangeInput.value">
        <output id="amount" name="amount" min-velue="0" max-value="500" for="rangeInput">0</output>
    </div>
</div>
{{-- <div class="col-lg-12">
            <div class="mb-3">
                <h4>Additional</h4>
                <div class="mb-2">
                    <input type="radio" class="me-2" id="Categories-1" name="Categories-1"
                        value="Beverages">
                    <label for="Categories-1"> Organic</label>
                </div>
                <div class="mb-2">
                    <input type="radio" class="me-2" id="Categories-2" name="Categories-1"
                        value="Beverages">
                    <label for="Categories-2"> Fresh</label>
                </div>
                <div class="mb-2">
                    <input type="radio" class="me-2" id="Categories-3" name="Categories-1"
                        value="Beverages">
                    <label for="Categories-3"> Sales</label>
                </div>
                <div class="mb-2">
                    <input type="radio" class="me-2" id="Categories-4" name="Categories-1"
                        value="Beverages">
                    <label for="Categories-4"> Discount</label>
                </div>
                <div class="mb-2">
                    <input type="radio" class="me-2" id="Categories-5" name="Categories-1"
                        value="Beverages">
                    <label for="Categories-5"> Expired</label>
                </div>
            </div>
        </div> --}}
<div class="col-lg-12">
    <h4 class="mb-3">Featured products</h4>
    @foreach ($allProduct as $product)
        <a href="{{route('client.shopDetail',$product->id)}}" class="d-flex align-items-center justify-content-start">
            <div class="rounded me-4" style="width: 100px; height: 100px;">
                <img src="{{ Storage::url($product->image) }}" class="img-fluid rounded" alt="">
            </div>
            <div>
                <h6 class="mb-2">{{ $product->name }}</h6>
                <div class="d-flex mb-2">
                    <i class="fa fa-star text-secondary"></i>
                    <i class="fa fa-star text-secondary"></i>
                    <i class="fa fa-star text-secondary"></i>
                    <i class="fa fa-star text-secondary"></i>
                    <i class="fa fa-star"></i>
                </div>
                <div class="d-flex mb-2">
                    <h5 class="fw-bold me-2">{{ number_format($product->price )}} vnđ</h5>
                </div>
            </div>
        </a>
    @endforeach
    <div class="d-flex justify-content-center my-4">
        <a href="{{ route('client.shop') }}"
            class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Vew
            More</a>
    </div>
</div>
