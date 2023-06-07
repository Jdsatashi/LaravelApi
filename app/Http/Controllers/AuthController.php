<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUSerRequest;
use App\Http\Response\HttpResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use HttpResponse;

    public function Login(LoginRequest $request)
    {
        if(!Auth::attempt($request->only(['email', 'password']))){
            return $this->error(null,'Invalid login request', 401);
        }
        $user = User::where('email', $request->email)->first();

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('Api of: '. $user->name)->plainTextToken,
        ]);
    }

    public function Register(StoreUserRequest $request){
        $user = User::Create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token: '. $user->name)->plainTextToken,
        ]);
    }

    public function Logout(){
        return response()->json('This is a logout');
    }
}
