<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * CRUD User controller
 */
class CrudUserController extends Controller
{

    //giao diện crud
    public function register()
    {
        return view('crud_user.create');
    }

    public function postUser(Request $request)
    {
        $request->validate([
            'username' => 'required|String',
            'password' => 'required|min:6|confirmed',
            'email' => 'required|email|unique:users',
        ]);

        $users = User::create([
            'name' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'likes' => $request->likes,
            'dislikes' => $request->dislikes,
        ]);

        return redirect()->route('user.login');
    }

    public function login()
    {
        return view('crud_user.login');
    }

    public function authUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('user.list')
                ->withSuccess('Signed in');
        }

        return redirect("crud_user.login")->withSuccess('Login details are not valid');
    }

    public function update(Request $request)
    {
        $user_id = $request->id;
        $user = User::find($user_id);

        return view('crud_user.update', ['user' => $user]);
    }

    public function postUpdate(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,id,' . $input['id'],
            'password' => 'required|min:6',
        ]);

        $user = User::find($input['id']);
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->likes = $input['likes'];
        $user->dislikes = $input['dislikes'];
        $user->password = $input['password'];
        $user->save();

        return redirect()->route('user.list')->withSuccess('You have signed-in');
    }

    public function list()
    {
        $list = User::all();

        return view('crud_user.list', compact('list'));
    }

    public function user_view($id)
    {
        $user = User::findOrFail($id);
        return view('crud_user.view', compact('user'));
    }

    public function delete($id)
    {
        // Tìm user theo id và xóa
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->route('user.list')->with('success', 'Đã xóa người dùng thành công!');
        }

        return redirect()->route('user.list')->with('error', 'Không tìm thấy người dùng!');
    }

    public function view()
    {
        return view('view');
    }
}
