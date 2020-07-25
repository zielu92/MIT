<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiUserController extends Controller
{
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email'=>'required|string|email||unique:users',
            'password'=>'required|string|confirmed',
        ]);

        $user = new User([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);

        $id = $user->save();
        return response()->json([
            'success' => true,
            "message" =>  "ok, created #".$id
        ], 201);
    }

    public function logout(Request $request) {
        $request->user()->token()->revoke();
        return response()->json([
            'success' => true,
            'message' => 'User logged out successfully'
        ],200);
    }


    public function profile(Request $request) {

        return response()->json($request->user(), 200);
    }

    public function login(Request $request) {

        $request->validate([
            'email'=>'required|string|email',
            'remember_me'=>'boolean',
        ]);

        $userCredentials = request(['email', 'password']);

        if(!Auth::attempt($userCredentials))
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);

        $user = $request->user();
        $tokenResult = $user->createToken('User Personal Access Token');
        $token = $tokenResult->token;

        if($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeek(2);
        }

        $token->save();

        return  response()->json([
            'success' => true,
            'token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateString(),
            "message" =>  "ok, user logged in",
            'user' =>  Auth::user()
        ], 200);
    }

}
