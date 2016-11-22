<?php

namespace App\Http\Controllers;

use App\Criterion;
use Illuminate\Http\Request;

use App\Http\Requests;
use Reply;

class CriterionController extends Controller
{
    /**
     * @SWG\Get(path="/criteria",
     *   tags={"Criteria"},
     *   summary="Get all criteria",
     *   description="",
     *   operationId="index",
     *   produces={"application/xml", "application/json"},
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
    public function index() {
        $criteria = Criterion::all();
        return Reply::reply(1, 'get_criteria_success', $criteria, 200);
    }
}
