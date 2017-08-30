<?php
// https://github.com/tymondesigns/jwt-auth/wiki/Creating-Tokens#creating-a-token-based-on-the-users-credentials

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;

class AuthenticateController extends Controller {
  public function login(Request $request) {
    $this->validate($request, [
      'email' => 'required|string|email|max:255',
      'password' => 'required|string|min:6'
    ]);
    $credentials = $request->only('email', 'password');

    try {
      if (!$token = JWTAuth::attempt($credentials)) {
        return response()->json(['error' => 'User and/or password are incorrect!'], 401);
      }
    } catch (JWTException $e) {
      return response()->json(['error' => 'Cannot create a token!'], 500);
    }

    $user = JWTAuth::setToken($token)->authenticate();

    return response()->json(["token" => $token, "user" => $user]);
  }

  public function register(Request $request) {
    $this->validate($request, [
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:6',
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password),
    ]);
    $token = JWTAuth::fromUser($user);

    return response()->json(["token" => $token, "user" => $user]);
  }

  public function logout() {
    $token = JWTAuth::getToken();
    JWTAuth::invalidate($token);
  }

  public function refreshToken() {
    $token = JWTAuth::getToken();
    $new_token = JWTAuth::refresh($token);

    return response()->json(["token" => $new_token]);
  }
}
