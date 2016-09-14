<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Reply;

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
            'code' => 'required|numeric'
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

}
