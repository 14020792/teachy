<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
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
     *     ),
     *      @SWG\Definition(
     *         definition="AuthenticateUpdate",
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
     *     ),
     *     @SWG\Definition(
     *         definition="AuthenticateLogin",
     *         @SWG\Property(
     *             property="username",
     *             type="string",
     *             default="",
     *         ),
     *         @SWG\Property(
     *             property="password",
     *             type="string",
     *             default="",
     *         )
     *     ),
     *     @SWG\Definition(
     *         definition="AssessmentStore",
     *         @SWG\Property(
     *             property="ins_sub_id",
     *             type="string",
     *             default="",
     *         ),
     *         @SWG\Property(
     *             property="assessments",
     *             type="string",
     *             default="[]",
     *         )
     *     ),
     *     @SWG\Definition(
     *         definition="CommentStore",
     *         @SWG\Property(
     *             property="content",
     *             type="string",
     *             default="",
     *         )
     *     )
     * )
     */

}
