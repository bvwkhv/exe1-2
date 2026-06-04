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
    public function register(){
        return view('crud_user.create');
    }

    public function postUser(Request $request){
        $request->validate([
            'username' => 'required|String',
            'password' => 'required|min:6|confirmed',
            'email' => 'required|email|unique:users',
        ]);

        $users = User::create([
            'name' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
        ]);

        return redirect()->route('user.login');
    }

    public function login(){
        return view('crud_user.login');
    }

    public function authUser(Request $request){
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

    public function update(Request $request){
        $user_id = $request->id;
        $user = User::find($user_id);

        return view('crud_user.update', ['user' => $user]);
    }

    public function postUpdate(Request $request){
    $input = $request->all();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,id,'.$input['id'],
            'password' => 'required|min:6',
        ]);

        $user = User::find($input['id']);
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = $input['password'];
        $user->save();

        return redirect()->route('user.list')->withSuccess('You have signed-in');
    }

    public function list(){
        $list = User::all();

        return view('crud_user.list', compact('list'));
    }

    public function view(){
        return view('view');
    }
}