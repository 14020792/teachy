<?php

namespace App\Http\Controllers;

use App\Assessment;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Reply;

class AssessmentController extends Controller
{
    /**
     * @SWG\Get(path="/assessments",
     *   tags={"User"},
     *   summary="Get all user's assessments",
     *   description="",
     *   operationId="index",
     *   produces={"application/xml", "application/json"},
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
    public function index()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $assessments = $user->assessments()
            ->join('instructor_subject', 'assessment.ins_sub_id', '=', 'instructor_subject.id')
            ->join('instructor', 'instructor_subject.instructor_id', '=', 'instructor.id')
            ->join('subject', 'instructor_subject.subject_id', '=', 'subject.id')
            ->join('criterion', 'assessment.criterion_id', '=', 'criterion.id')
            ->select('assessment.*',
                'instructor.id as instructor_id', 'instructor.name as instructor_name',
                'instructor.email', 'instructor.avatar', 'instructor.code as instructor_code', 'instructor.info',
                'subject.id as subject_id', 'subject.name as subject_name', 'subject.code as subject_code',
                'criterion.text')
            ->orderBy('assessment.created_at', 'desc')
            ->orderBy('criterion.id', 'asc')
            ->get();

        $res = [];
        foreach ($assessments as $assessment) {
            $text = $assessment->text;
            $value = $assessment->value;
            $ins_sub_id = $assessment->ins_sub_id;
            $criterion_id = $assessment->criterion_id;
            unset($assessment->ins_sub_id); unset($assessment->text);
            unset($assessment->value); unset($assessment->criterion_id);
            if (!isset($res[$ins_sub_id])) {
                $res[$ins_sub_id] = $assessment->toArray();
                $res[$ins_sub_id]['assessments'] = [];
            }
            $res[$ins_sub_id]['assessments'][$criterion_id] = [
                'text' => $text,
                'value' => $value
            ];
        }

        return Reply::reply(1, 'get_assessments_success', $res, 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @SWG\Post(path="/assessments",
     *   tags={"User"},
     *   summary="Create assessment for an instructor-subject pair",
     *   description="",
     *   operationId="index",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     name="data",
     *     in="body",
     *     required=true,
     *     @SWG\Schema(ref="#/definitions/AssessmentStore"),
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
    public function store(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $input = $request->all();

        $assessments = $input['assessments'];

        foreach ($assessments as $assessment) {
            Assessment::create([
                'user_id' => $user->id,
                'ins_sub_id' => $input['ins_sub_id'],
                'criterion_id' => $assessment['criterion_id'],
                'value' => $assessment['value']
            ]);
        }

        return Reply::reply(1, 'assess_success', null, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
