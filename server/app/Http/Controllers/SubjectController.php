<?php

namespace App\Http\Controllers;

use App\Instructor;
use App\InstructorSubject;
use App\Subject;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Reply;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @SWG\Get(path="/subjects",
     *   tags={"Subject"},
     *   summary="Get list subjects - instructors",
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
        $subjects = Subject::with('instructors')->get();
        return Reply::reply(1, 'get_subjects_success', $subjects, 200);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * @SWG\Get(path="/subjects/{id}",
     *   tags={"Subject"},
     *   summary="Get info of a subject",
     *   description="",
     *   operationId="index",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="",
     *     required=true,
     *     type="string"
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
    public function show($id)
    {
        $subject = Subject::findOrFail($id);

        foreach ($subject->instructors as &$instructor) {
            $ins_sub = InstructorSubject::where('instructor_id', $instructor->id)
                ->where('subject_id', $subject->id)->first();
            $assessments = $ins_sub->assessments()->with('criterion')
                ->select(DB::raw('AVG(value) as value'), 'criterion_id')
                ->groupBy('criterion_id')
                ->orderBy('criterion_id', 'asc')
                ->get();
            $instructor->assessments = $assessments;
        }

        return Reply::reply(1, 'get_subject_success', $subject, 200);
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
