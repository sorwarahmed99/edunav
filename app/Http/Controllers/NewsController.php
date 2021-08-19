<?php

namespace App\Http\Controllers;

use App\News;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

date_default_timezone_set("Asia/Dhaka");

class NewsController extends Controller
{
    public function __construct()
	{
		$this->middleware('IsAdmin:is_admin');
	}

    
    public function index()
    {
        if (session('success_message')) {
            Alert::success(session('success_message'))->toToast()->position('center-end');
        }
        
        $newses = News::all();
        return view('admin.allNews',compact('newses'));
    }

  
    public function create()
    {
        if (session('success_message')) {
            Alert::success(session('success_message'))->toToast()->position('center-end');
        }

        return view('admin.addNews');
    }

    
    public function store(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $news = new News;

        $news->title = $request['title'];
        $news->subtitle = $request['subtitle'];
        $news->description = $request['description'];
        $news->user_id = Auth::user()->id;
        $news->status = $request['status'];

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

        return back()->withSuccessMessage('News Added Successfully !');
    }

    
    public function show(News $news)
    {
        //
    }


    public function edit($id)
    {
        $news = News::findOrFail($id);
        return \view('admin.editNews',compact('news'));
    }


    public function update(Request $request, $id)
    {
        
    }

   
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $file = $news->image;

        if(is_file($file))
        {
            File::delete($file);
        }
        $news->delete();
        return redirect()->back()->withSuccessMessage('News Deleted');
        

        
    }
}
