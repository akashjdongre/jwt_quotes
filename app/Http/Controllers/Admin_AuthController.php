<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\Jwtadmin;
use DB;

class Admin_AuthController extends Controller
{
    
    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login', 'register']]);
    // }

    /* --------------------- DO NOT USE _ IN FUNCTION NAME (e.g register_admin) ---------------------------- */

    public function register(Request $request)
    {	
    	$validator = Validator::make($request->all(), [
            'name' => 'required|between:2,100',
            'email' => 'required|email|unique:admins|max:50',
            'password' => 'required|confirmed|string|min:6',
        ]);

        // if($validator->fails())
        // {
        //     return response()->json($validator->errors()->toJson(), 400);
        // }

        if($validator->fails())
        {
            return response()->json(
                [
                "status" => "failed",
                "message" => "Validation error: There was an error while processing data.",
                "errors" => $validator->errors()->toJson(), 
                ],
                400
            );
        }

        $user = Jwtadmin::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password),
                    'simple_pass' => $request->password]
                ));

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully registered',
            'user' => $user
        ], 201);
    }



    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $user = Jwtadmin::select('email', 'name')->where(['email'=> $request->email])->first();
        // return $this->createNewToken($token);
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully login',
            'isSuccess'=> true,
            'data' => $user,
            'token'=> $token
        ], 201);
    }


    public function adminprofile()
    {  
                
        $userData = response()->json(auth()->user());
        if(empty($userData))
        {
            return response()->json([
                'status' => 'failed',
                'error' => 'Unauthorized'
            ], 401);
            exit;
        }
        else
        {
            return  $userData;
        }
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }


    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }


}
