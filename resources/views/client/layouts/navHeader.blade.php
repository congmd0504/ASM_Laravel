@if (session()->has('success'))
    {{ displayToastrMessageSuccess(session('success')) }}
@endif
@if (session()->has('error'))
    {{ displayToastrMessageError(session('error')) }}
@endif
@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        {{ displayToastrMessageError($error) }}
    @endforeach
@endif
<div class="container topbar bg-primary d-none d-lg-block">
    <div  class="d-flex justify-content-between">
        <div class="top-info ps-2">
            <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#"
                    class="text-white">123 Street, New York</a></small>
            <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                    class="text-white">Email@Example.com</a></small>
        </div>
        <div class="top-link pe-2">
            <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
            <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
            <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
        </div>
    </div>
</div>
<div class="container px-0">
    <nav class="navbar navbar-light bg-white navbar-expand-xl">
        <a href="{{route('client.index')}}" class="navbar-brand">
            <h1 class="text-primary display-6">Fruitables</h1>
        </a>
        <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse">
            <span class="fa fa-bars text-primary"></span>
        </button>
        <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
            <div class="navbar-nav mx-auto">
                <a href="{{route('client.index')}}" class="nav-item nav-link active">Home</a>
                <a href="{{route('client.shop')}}" class="nav-item nav-link">Shop</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Danh mục</a>
                    <div class="dropdown-menu m-0 bg-secondary rounded-0">
                        @foreach ($categories as $category)
                            @if ($category->id == 1)
                                <a href="{{route('client.shop')}}" class="dropdown-item">{{ $category->name }}</a>
                                @continue
                            @endif
                            <a href="{{route('client.shop.id',$category->id)}}"
                                class="dropdown-item">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </div>
                <a href="{{route('client.contact')}}" class="nav-item nav-link">Contact</a>
            </div>
            <div class="d-flex m-3 me-0">
                <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4"
                    data-bs-toggle="modal" data-bs-target="#searchModal"><i
                        class="fas fa-search text-primary"></i></button>
                <a href="{{route('client.getCart')}}" class="position-relative me-4 my-auto">
                    <i class="fa fa-shopping-bag fa-2x"></i>
                    <span
                        class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                        style="top: -5px; left: 15px; height: 20px; min-width: 20px;">
                        @if (Auth::check())
                            {{$totalCart}}
                            @else
                            0
                        @endif
                    </span>
                </a>
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @if (Auth::user())
                        <li class="nav-item dropdown ">
                            <a id="navbarDropdown"
                                class="nav-link dropdown-toggle border border-success rounded text-success"
                                href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" v-pre>
                                <i class="fa fa-user me-2"></i> {{ Auth::user()->username }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('stastic')}}">
                                    Trang admin
                                </a>
                                <a class="dropdown-item" href="{{route('editUser',Auth::id())}}">
                                    Cập nhập thông tin
                                </a>
                                <a class="dropdown-item" href="{{route('logout')}}">
                                    Logout
                                </a>
                            </div>
                        </li>
                    @else
                        <li class="nav-item ">
                            <a class="nav-link border border-success rounded text-success" href="{{route('getLogin')}}">Login</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="nav-link border border-warning rounded text-warning" href="{{route('getRegister')}}">Register</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    
</div>

