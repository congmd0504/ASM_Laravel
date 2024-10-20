<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRegisterRequest;
use App\Mail\ForgotPassword;
use App\Models\ResetPass;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //Client
    public function getLogin()
    {
        return view('client.auth.login');
    }
    public function postLogin(Request $request)
    {
        $data = $request->only('username', 'password');
        $data = $request->validate([
            'username' => ['required'],
            'password' => ['required', 'min:6'],
        ]);
        if (Auth::attempt($data)) {
            return redirect()->route('client.index')->with('success', 'Bạn đã đăng nhập thành công !');
        } else {
            return back()->with('error', 'Username hoặc password sai !');
        }
    }

    public function getRegister()
    {
        return view('client.auth.register');
    }
    public function postRegister(PostRegisterRequest $request)
    {
        // dd($request->username);
        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ];
        User::query()->create($data);
        return redirect()->route('getLogin')->with('success', 'Đăng ký thành công !');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('client.index')->with('success', 'Đăng xuất thành công !');
    }
    public function edit(User $user)
    {
        return view('client.auth.update', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'username' => ['required', 'unique:users,username,' . $user->id, 'min:3'],
            'fullname' => ['required', 'min:3'],
            'email' => ['required', 'unique:users,email,' . $user->id, 'email'],
            'image' => ['nullable', 'image'],
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = Storage::put('users', $request->file('image'));
            if ($user->image) {
                Storage::delete($user->image);
            }
        }
        $user->update($data);
        return redirect()->route('editUser', $user)->with('success', 'Cập nhập thành công!');
    }

    //Admin
    public function listUser()
    {
        $users = User::all();
        return view('admin.users.list', compact('users'));
    }
    public function editActive(Request $request, User $user)
    {
        // dd($request->all());
        $data['active'] = $request->active;
        $user->update($data);
        return redirect()->route('admin.user')->with('success', 'Cập nhập thành công !');
    }
    public function addUser()
    {
        return view('admin.users.add');
    }
    public function postUser(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'username' => ['required', 'unique:users', 'min:3'],
            'email' => ['required', 'unique:users', 'email'],
            'password' => ['required', 'min:5'],
            'confirmpass' => ['required', 'min:5', 'same:password'],
            'fullname' => ['nullable', 'min:3'],
            'image' => ['nullable', 'image'],
            'role' => ['nullable'],
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = Storage::put('users', $request->file('image'));
        }
        User::query()->create($data);
        return redirect()->route('admin.addUser')->with('success', 'Thêm mới thành công !');
    }
    // public function forgetPass()
    // {
    //     return view('client.auth.forget-pass');
    // }
    // public function postForgetPass(Request $request)
    // {
    //     // Validate yêu cầu
    //     $request->validate([
    //         'email' => 'required|email|exists:users,email', // Kiểm tra email tồn tại trong bảng users
    //     ]);

    //     // Lấy thông tin người dùng từ email
    //     $user = User::where('email', $request->email)->first();

    //     $token = \Str::random(40);

    //     DB::table('reset_passes')->insert([
    //         'email' => $request->email,
    //         'token' => $token,
    //     ]);
    //     // dd($user,$request->email,$token);
    //     try {
    //         Mail::to($request->email)->send(new ForgotPassword($user, $token));
    //     } catch (\Exception $e) {
    //         return back()->with('error', 'Không thể gửi email: ' . $e->getMessage());
    //     }

    //     return back()->with('success', 'Vui lòng kiểm tra email để đặt lại mật khẩu.');

    // }
    // // Hiển thị form đặt lại mật khẩu
    // public function showResetForm($token)
    // {
    //     // return 
    // }

    // // Đặt lại mật khẩu
    // public function reset(Request $request, $token)
    // {

    // }


}
