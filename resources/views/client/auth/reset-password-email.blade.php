<h3>Hi ,{{$user->username}}</h3>
<p>Bạn đã yêu cầu đặt lại mật khẩu. Nhấp vào liên kết bên dưới để đặt lại mật khẩu của bạn:</p>
<a class="btn btn-info" href="{{route('password.reset.custom',$token)}}">Đặt lại mật khẩu</a>