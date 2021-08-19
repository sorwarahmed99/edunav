<?php

namespace App\Http\Controllers;

use App\StudentPosrtal;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StudentPosrtalController extends Controller
{

    public function __construct()
	{
		$this->middleware('IsAdmin:is_admin');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session('success_message')) {
            Alert::success(session('success_message'))->toToast()->position('center-end');
        }
        $portals = StudentPosrtal::orderBy('created_at','desc')->get();
        return view('admin.studentportal',\compact('portals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session('success_message')) {
            Alert::success(session('success_message'))->toToast()->position('center-end');
        }
        return \view('admin.addstudentportal');
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
            'subtitle' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $news = new StudentPosrtal;

        $news->title = $request['title'];
        $news->subtitle = $request['subtitle'];
        $news->description = $request['description'];
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

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentPosrtal  $studentPosrtal
     * @return \Illuminate\Http\Response
     */
    public function show(StudentPosrtal $studentPosrtal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentPosrtal  $studentPosrtal
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentPosrtal $studentPosrtal)
    {
        return \view('admin.editstudentportal');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentPosrtal  $studentPosrtal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentPosrtal $studentPosrtal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentPosrtal  $studentPosrtal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $st = StudentPosrtal::findOrFail($id);
        $file = $st->image;

        if(is_file($file))
        {
            File::delete($file);
        }
        $st->delete();
        return redirect()->back()->withSuccessMessage('Information Deleted');
    }
}
