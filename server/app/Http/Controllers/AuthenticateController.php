<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Reply;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticateController extends Controller
{
    /**
     * @SWG\Post(path="/register",
     *   tags={"User"},
     *   summary="Register",
     *   description="",
     *   operationId="index",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     name="data",
     *     in="body",
     *     required=true,
     *     @SWG\Schema(ref="#/definitions/AuthenticateRegister"),
     *   ) ,
     *   @SWG\Response(
     *     response=200,
     *     description="successful operation",
     *     @SWG\Schema(type="string"),
     *     @SWG\Header(
     *       header="X-Rate-Limit",
     *       type="integer",
     *       format="int32",
     *       description=""
     *     ),
     *     @SWG\Header(
     *       header="X-Expires-After",
     *       type="string",
     *       format="date-time",
     *       description="date in UTC when token expires"
     *     )
     *   ),
     *   @SWG\Response(response=400, description="")
     * )
     */
    public function register(Request $request) {
        $input = $request->all();
        $validator = Validator::make($input, [
            'username' => 'required|min:4|unique:user',
            'email' => 'required|email|unique:user',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
            'name' => 'required',
            'code' => 'required|numeric|unique:user'
        ]);

        if ($validator->fails()) {
            return Reply::reply(0, 'register_failed', $validator->messages(), 400);
        }

        $user = User::create([
            'username' => $input['username'],
            'email' => $input['email'],
            'name' => $input['name'],
            'code' => $input['code'],
            'password' => bcrypt($input['password'])
        ]);
        $user->avatar = isset($input['avatar']) ? $input['avatar'] : null;
        $user->save();

        return Reply::reply(1, 'register_success', null, 200);
    }

    /**
     * @SWG\Post(path="/login",
     *   tags={"User"},
     *   summary="Login",
     *   description="",
     *   operationId="index",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     name="data",
     *     in="body",
     *     required=true,
     *     @SWG\Schema(ref="#/definitions/AuthenticateLogin"),
     *   ) ,
     *   @SWG\Response(
     *     response=200,
     *     description="successful operation",
     *     @SWG\Schema(type="string"),
     *     @SWG\Header(
     *       header="X-Rate-Limit",
     *       type="integer",
     *       format="int32",
     *       description=""
     *     ),
     *     @SWG\Header(
     *       header="X-Expires-After",
     *       type="string",
     *       format="date-time",
     *       description="date in UTC when token expires"
     *     )
     *   ),
     *   @SWG\Response(response=400, description="")
     * )
     */
    public function login(Request $request) {
        $input = $request->all();
        $validator = Validator::make($input, [
            'username' => 'required|min:4',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            return Reply::reply(0, 'login_failed', $validator->messages(), 400);
        }

        $user = User::where('username', $input['username'])->first();

        if (!$user) {
            return Reply::reply(0, 'invalid_username', null, 400);
        }

        if (!Hash::check($input['password'], $user->password)) {
            return Reply::reply(0, 'incorrect_password', null, 400);
        }

        try {
            $claims = ['user' => $user->toArray()];
            if (!$token = JWTAuth::fromUser($user, $claims)) {
                return Reply::reply(0, 'invalid_credentials', null, 401);
            }
        } catch (JWTException $e) {
            return Reply::reply(0, 'token_failed', null, 500);
        }

        return Reply::reply(1, 'login_success', ['token' => $token], 200);

    }

    /**
     * @SWG\Put(path="/update",
     *   tags={"User"},
     *   summary="Update",
     *   description="",
     *   operationId="index",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     name="data",
     *     in="body",
     *     required=true,
     *     @SWG\Schema(ref="#/definitions/AuthenticateUpdate"),
     *   ),
     *   @SWG\Parameter(
     *     name="Authorization",
     *     in="header",
     *     description="",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Response(
     *     response=200,
     *     description="successful operation",
     *     @SWG\Schema(type="string"),
     *     @SWG\Header(
     *       header="X-Rate-Limit",
     *       type="integer",
     *       format="int32",
     *       description=""
     *     ),
     *     @SWG\Header(
     *       header="X-Expires-After",
     *       type="string",
     *       format="date-time",
     *       description="date in UTC when token expires"
     *     )
     *   ),
     *   @SWG\Response(response=400, description="")
     * )
     */
    public function update(Request $request) {
        $input = $request->all();
        $user = JWTAuth::parseToken()->authenticate();

        $validator = Validator::make($input, [
            'code' => "numeric|unique:user,code,{$user->code},code",
            'email' => "email|unique:user,email,{$user->email},email"
        ]);

        if ($validator->fails()) {
            return Reply::reply(0, 'update_failed', $validator->messages(), 400);
        }

        $user->fill($input);
        $user->update();

        return Reply::reply(1, 'update_success', null, 200);
    }

}
