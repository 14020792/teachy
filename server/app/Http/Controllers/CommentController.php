<?php

namespace App\Http\Controllers;

use App\Comment;
use App\InstructorSubject;
use Illuminate\Http\Request;
use Reply;
use Tymon\JWTAuth\Facades\JWTAuth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => ['store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @SWG\Get(path="/classes/{ins_sub_id}/comments",
     *   tags={"Comment"},
     *   summary="Get comments of class",
     *   description="",
     *   operationId="index",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     name="ins_sub_id",
     *     in="path",
     *     description="",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Parameter(
     *     name="last_id",
     *     in="query",
     *     description="",
     *     required=false,
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
    public function index(Request $request, $ins_sub_id)
    {
        $last_id = $request->input('last_id', -1);

        $ins_sub = InstructorSubject::find($ins_sub_id);
        $comments = $ins_sub->comments()->with('user');
        if ($last_id > 0) $comments = $comments->where('id', '<', $last_id);
        $comments = $comments->orderBy('id', 'desc')->take(5)->get();

        return Reply::reply(1, 'get_comments_success', $comments, 200);

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
    /**
     * @SWG\Post(path="/classes/{ins_sub_id}/comments",
     *   tags={"Comment"},
     *   summary="Comment a class",
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
     *   @SWG\Parameter(
     *     name="ins_sub_id",
     *     in="path",
     *     description="",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Parameter(
     *     name="data",
     *     in="body",
     *     required=true,
     *     @SWG\Schema(ref="#/definitions/CommentStore"),
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
    public function store(Request $request, $ins_sub_id)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $comment = Comment::create([
            'user_id' => $user->id,
            'ins_sub_id' => $ins_sub_id,
            'content' => $request->input('content', '')
        ]);
        $comment->user;

        return Reply::reply(1, 'comment_success', $comment, 200);
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
