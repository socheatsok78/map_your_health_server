<?php

namespace App\Http\Controllers\Api\Auth;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\Auth\LoginRequest;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->only(['user']);
    }

    public function user(Request $request)
    {
        return $request->user();
    }

    public function login(LoginRequest $request)
    {
        $inputs = collect($request->validated());

        $username = $inputs->get('username');

        $password  = $inputs->get('password');

        $status = Auth::attempt(['username' => $username, 'password' => $password]);

        if ($status) {
            return Auth::user();
        } else {
            abort(403, "Error Processing Request");
        }
    }
}
