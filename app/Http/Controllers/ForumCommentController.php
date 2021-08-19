<?php

namespace App\Http\Controllers;

use App\ForumComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class ForumCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validation = $request->validate([
            'comment' => 'required',
        ]);

        $news = new ForumComment;

        $news->comment = $request['comment'];
        $news->user_id = Auth::user()->id;
        $news->forum_post_id = $request['forum_post_id'];
        $news->status = 0;
        $news->save();

        return redirect()->back()->withSuccessMessage('Comment Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ForumComment  $forumComment
     * @return \Illuminate\Http\Response
     */
    public function show(ForumComment $forumComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ForumComment  $forumComment
     * @return \Illuminate\Http\Response
     */
    public function edit(ForumComment $forumComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ForumComment  $forumComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ForumComment $forumComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ForumComment  $forumComment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $how = ForumComment::findOrFail($id)->delete();
		return redirect()->back()->withSuccessMessage('Comment Deleted');
    }
}
