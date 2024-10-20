@extends('client.index')
@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Shopping Cart</h2>
        <table class="table table-bordered">
            <thead class="table-light">
                <tr class="text-center table-success">
                    <th scope="col">STT</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Product Item 1 -->
                @foreach ($listCart as $index=> $item)
                    <tr class="text-center">
                        <td>{{ $index+1}}</td>
                        <td><img src="{{ Storage::url($item->product->image) }}" width="100" alt="Product Image"
                                class="img-fluid"></td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ number_format($item->product->price) }}vnđ</td>
                        <td c>
                            <div class="input-group d-inline-flex justify-content-center" style="width: 100px;">
                                <button class="btn btn-sm btn-outline-secondary btn-minus" type="button">-</button>
                                <input type="text" class="form-control text-center border-0" value="{{ $item->quantity }}" min="1">
                                <button class="btn btn-sm btn-outline-secondary btn-plus" type="button">+</button>
                            </div>
                        </td>
                        <td>{{ number_format($item->product->price * $item->quantity) }} vnđ</td>
                        <td>
                           <form action="{{route('client.delete',$item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                           </form>
                        </td>
                    </tr>
                    @php
                    $tongdon += $item->product->price * $item->quantity  
                    @endphp
                    @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <h4>Total: <span>{{number_format($tongdon)}} vnđ</span></h4>
        </div>
        <div class="d-flex justify-content-end mt-3">
            <button class="btn btn-primary"> Checkout</button>
        </div>
    </div>
@endsection
