<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Models\FileKonsultan;
use App\Models\FileKontraktor;
use App\Models\Konsultan;
use App\Models\Kontraktor;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;


class AuthController extends BaseController
{
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success = array();
            $success = [
                'user' => User::where('id', $user->id)->first(),
            ];
            return $this->sendResponse($success, 'User login successfully.');
        } else {
            return $this->sendError('Unauthorized.', ['error' => 'Unauthorized']);
        }
    }

    public function daftar(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
            ],
            [
                'email.email' => "Email tidak valid",
                'email.unique' => "Email sudah digunakan",
            ]
        );

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        $user = User::create($input);
        return $this->sendResponse($user, 'User register successfully');
    }

    public function logout(Request $request)
    {
        $user = User::firstWhere('id', Auth::user()->id)->update(['fireBaseToken' => '-']);
        $request->user()->tokens()->delete();
        return $this->sendResponse($user, 'You have been logged out');
    }
}
