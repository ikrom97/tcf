<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function login()
  {
    return view('auth.login');
  }

  public function check(Request $request)
  {
    $user = User::where('login', '=', $request->login)->first();

    if (!$user) {
      return response(['error' => 'Пользователь не найден'], 400);
    }

    if (Hash::check($request->password, $user->password)) {
      session()->put('loggedUser', $user->id);

      return response(['route' => route('admin')], 200);
    } else {
      return response(['error' => 'Неправильный пароль'], 400);
    }
  }

  public function logout()
  {
    if (session()->has('loggedUser')) {
      session()->pull('loggedUser');
    }

    return redirect(route('home'));
  }
}
