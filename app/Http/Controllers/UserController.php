<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view("fe.login");
    }
    public function register()
    {
        return view("fe.register");
    }
    public function postRegister(Request $request)
    {

        $request->merge(['password' => Hash::make($request->password)]);
        try {
            User::create($request->all());
            return redirect()->route('login')->with('success', 'Đăng ký thành công!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Đã xảy ra lỗi khi đăng ký. Vui lòng thử lại.');
        }
    }
    public function postLogin(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('index');
        } else {
            return redirect()->back()->with('error', 'Bạn Đã Nhập Sai Mật Khẩu!');
        }
    }
    public function logout(Request $request)
    {

        Auth::logout();
        return redirect()->route('index');
    }


    public function index(Request $request)
    {
        $query = User::query();


        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $users = $query->get();

        return view('admin.user.index', compact('users'));
    }




    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->status = $request->status;
        $user->save();

        return redirect()->route('user.index')->with('success', 'Người dùng đã được thêm mới.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->status = $request->status;

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'required|string|min:8|confirmed',
            ]);
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('user.index')->with('success', 'Người dùng đã được cập nhật.');
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('$user.index')->with('success', 'Xóa Thành Công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Xóa Thất Bại');
        }
    }





    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }
}
