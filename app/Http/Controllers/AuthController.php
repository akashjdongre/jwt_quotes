<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\User;
use DB;

class AuthController extends Controller
{
    /**
    * Create a new AuthController instance.
    *
    * @return void
    */
    public function __construct()
    {
    $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
    * Register a User.
    *
    * @return \Illuminate\Http\JsonResponse
    */

 
        // public function register(Request $request)
        // {
        //     $validator = Validator::make($request->all(), [
        //         'name' => 'required|between:2,100',
        //         'email' => 'required|email|unique:users|max:50',
        //         'password' => 'required|confirmed|string|min:6',
        //     ]);

        //     if($validator->fails()){
        //         return response()->json($validator->errors()->toJson(), 400);
        //     }

        //     $user = User::create(array_merge(
        //                 $validator->validated(),
        //                 ['password' => bcrypt($request->password)]
        //             ));

        //     return response()->json([
        //         'message' => 'Successfully registered',
        //         'user' => $user
        //     ], 201);
        // }


        /**
        * Register a User.
        *
        * @return \Illuminate\Http\JsonResponse
        */

        public function register(Request $request) 
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|between:2,100',
                'email' => 'required|string|email|max:100|unique:users',
                'password' => 'required|string|confirmed|min:6',
            ]);

            if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
            }

            $user = User::create(array_merge(
                        $validator->validated(),
                        ['password' => bcrypt($request->password)]
                    ));

            return response()->json([
                'message' => 'User successfully registered',
                'user' => $user
            ], 201);
        }



        public function update(Request $request)
        {
            $validator = Validator::make($request->all(), [
            'use_id' => 'required',
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100',
            ]);

            if($validator->fails())
            {
            return response()->json($validator->errors()->toJson(), 400);
            }

            //$login = (new App\User)->find(10);
            //$login->username ='updated_username';
            //$login->save();

            //$user = User::updateOrCreate(['id' => $request->use_id] , ['name' => $request->name , 'email' => $request->email ] );
            $user = User::updateOrCreate(['id' => $request->use_id] , $validator->validated() );


            return response()->json([
            'message' => 'User record updated successfully',
            'user' => $user
            ], 201);

        }


        public function getCustomer(Request $request,$cust_id='')
        {
            $validator = Validator(
            [
                $cust_id => 'numeric'
            ]);

            if($validator->fails())
            {
            return response()->json($validator->errors()->toJson(), 400);
            }

            if(!empty($cust_id))
            {
            $users = DB::table('admins')
                //->select('cust_code','cust_name','cust_city','opening_amt','cust_country','phone_no','agent_code')
                //->where('cust_code', $cust_id)
                ->get();
            }
            else
            {
            $users = DB::table('admins')
                //->select('cust_code','cust_name','cust_city','opening_amt','cust_country','phone_no','agent_code')
                ->get();

            }

            if(count($users) > 0)   
            {
                return response()->json([
                'message' => 'Users record fetched successfully',
                'user' => $users
                ], 201);
            }
            else
            {
                return response()->json([
                'message' => 'NO user found...'
                ], 400);

            }
        }


    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
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

        return $this->createNewToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
