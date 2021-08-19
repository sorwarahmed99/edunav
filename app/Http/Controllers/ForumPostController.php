<?php

namespace App\Http\Controllers;

use App\News;
use App\ForumPost;
use App\ForumComment;
use File;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ForumPostController extends Controller
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
    public function joinus()
    {
        if(Auth::check())
        {
            $notifis = Notification::where('to',Auth::user()->id)->orderBy('created_at','desc')->limit(2)->get();
        } else {
            $notifis = '';
        }

        if (session('success_message')) {
            Alert::success(session('success_message'));
        }

        $newses = ForumPost::orderBy('created_at','asc')->get();
        return view('joinus',compact('newses','notifis'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session('success_message')) {
            Alert::success(session('success_message'));
        }

        if(Auth::check())
        {
            $notifis = Notification::where('to',Auth::user()->id)->orderBy('created_at','desc')->limit(2)->get();
        } else {
            $notifis = '';
        }

        return \view('student.forumPost',\compact('notifis'));
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
            'title' => 'required',
            'description' => 'required',
        ]);

        $news = new ForumPost;

        $news->title = $request['title'];
        $news->description = $request['description'];
        $news->user_id = Auth::user()->id;
        $news->status = 1;

        if($request->hasFile('image')) {
            //get filename with extension
            $filenamewithextension = $request->file('image')->getClientOriginalName();
      
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            //get file extension
            $extension = $request->file('image')->getClientOriginalExtension();
      
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
      
            //Upload File
			$image = $request->file('image')->move('uploads/news', $filenametostore);
			$news->image = $image;
		}
        $news->save();

        return back()->withSuccessMessage('Post created successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */
    public function show(ForumPost $post)
    {
        if(Auth::check())
        {
            $notifis = Notification::where('to',Auth::user()->id)->orderBy('created_at','desc')->limit(2)->get();
        } else {
            $notifis = '';
        }

        $post->views = $post->views+1;
        $post->save();

        $latest = ForumPost::orderBy('created_at','desc')->limit(3)->get();
        $comments = ForumComment::where('forum_post_id',$post->id)->orderBy('created_at','desc')->limit(5)->get();
        return view('student.singleForumPost',\compact('post','latest','comments','notifis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */
    public function edit(ForumPost $forumPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ForumPost $forumPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $how = ForumPost::findOrFail($id);
		$file = $how->image;
		if(is_file($file))
		{
			File::delete($file);
		}
		$how->delete();
		return redirect()->back()->withSuccessMessage('Post Deleted');
    }
}
