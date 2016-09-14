<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ApiDocController extends Controller
{
    /**
     * @SWG\Swagger(
     *     basePath="",
     *     schemes={"http"},
     *     produces={"application/json"},
     *     consumes={"application/json"},
     *     @SWG\Info(
     *         version="1.0",
     *         title="Teachy API",
     *         description="Teachy API",
     *         termsOfService="",
     *         @SWG\License(name="UET")
     *     ),
     *     @SWG\Definition(
     *         definition="AuthenticateRegister",
     *         @SWG\Property(
     *             property="username",
     *             type="string",
     *             default="",
     *         ),
     *         @SWG\Property(
     *             property="password",
     *             type="string",
     *             default="",
     *         ),
     *        @SWG\Property(
     *             property="password_confirmation",
     *             type="string",
     *             default="",
     *         ),
     *        @SWG\Property(
     *             property="name",
     *             type="string",
     *             default="",
     *         ),
     *        @SWG\Property(
     *             property="email",
     *             type="string",
     *             default="",
     *         ),
     *        @SWG\Property(
     *             property="avatar",
     *             type="string",
     *             default="",
     *        ),
     *        @SWG\Property(
     *             property="code",
     *             type="string",
     *             default="",
     *         )
     *     )
     * )
     */

}
