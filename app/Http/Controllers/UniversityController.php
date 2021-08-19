<?php

namespace App\Http\Controllers;

use App\University;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class UniversityController extends Controller
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

        $universities = University::orderBy('created_at','desc')->get();
        return \view('admin.universities',compact('universities'));
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
        
        return \view('admin.addUniversities');
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
            'logo' => 'required',
        ]);

        $news = new University;

        if($request->hasFile('logo')) {
            //get filename with extension
            $filenamewithextension = $request->file('logo')->getClientOriginalName();
      
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            //get file extension
            $extension = $request->file('logo')->getClientOriginalExtension();
      
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
      
            //Upload File
			$image = $request->file('logo')->move('uploads/news', $filenametostore);
			$news->image = $image;
		}
        $news->save();

        return back()->withSuccessMessage('University Added Successfully !');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\University  $university
     * @return \Illuminate\Http\Response
     */
    public function show(University $university)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\University  $university
     * @return \Illuminate\Http\Response
     */
    public function edit(University $university)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\University  $university
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, University $university)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\University  $university
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $why = University::findOrFail($id);
        $file = $why->image;
        if(is_file($file))
        {
            File::delete($file);
        }
        $why->delete();
        return redirect()->back()->withSuccessMessage('University Deleted');
    }
}
