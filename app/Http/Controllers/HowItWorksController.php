<?php

namespace App\Http\Controllers;

use App\HowItWorks;
use Illuminate\Http\Request;
use File;
use RealRashid\SweetAlert\Facades\Alert;

class HowItWorksController extends Controller
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

        $hows = HowItWorks::orderBy('created_at','desc')->get();
        return \view('admin.howItWorks',compact('hows'));
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
        
        return \view('admin.addHowItWorks');
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
            'image' => 'required',
        ]);

        $news = new HowItWorks;

        $news->title = $request['title'];
        $news->subtitle = $request['subtitle'];
        $news->description = $request['description'];

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
     * @param  \App\HowItWorks  $howItWorks
     * @return \Illuminate\Http\Response
     */
    public function show(HowItWorks $howItWorks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HowItWorks  $howItWorks
     * @return \Illuminate\Http\Response
     */
    public function edit(HowItWorks $howItWorks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HowItWorks  $howItWorks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HowItWorks $howItWorks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HowItWorks  $howItWorks
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $how = HowItWorks::findOrFail($id);
		$file = $how->image;
		if(is_file($file))
		{
			File::delete($file);
		}
		$how->delete();
		return redirect()->back()->withSuccessMessage('How It Works Deleted');
    }
}
