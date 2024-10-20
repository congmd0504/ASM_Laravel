@extends('admin.home')
@section('content')
    @if (session()->has('success'))
        {{ displayToastrMessageSuccess(session('success')) }}
    @endif
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Bình luận </h3>
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
                    <a href="#">Bình luận </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Danh sách bình luận</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Danh sách bình luận</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>NgƯỜI BÌNH LUẬN</th>
                                    <th>TÊN SẢN PHẨM</th>
                                    <th>NỘI DUNG</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $index => $comment)
                                    <tr class="text-center">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $comment->user_name }}</td>
                                        <td>{{ $comment->product_name }}</td>
                                        <td>{{ $comment->content }}</td>
                                        <td>
                                            <div class="form-button-action ">
                                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Bạn có muốn xóa không ?')" type="submit" title="Xóa" class="btn btn-link btn-danger">
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
    @endsection
