<?php

namespace App\Http\Controllers;

use App\WhyUk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class WhyUkController extends Controller
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

        $whys = WhyUk::orderBy('created_at','desc')->get();
        return \view('admin.whyUk',compact('whys'));
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
        
        return \view('admin.addWhyUk');
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

        $news = new WhyUk;

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
     * @param  \App\WhyUk  $whyUk
     * @return \Illuminate\Http\Response
     */
    public function show(WhyUk $whyUk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WhyUk  $whyUk
     * @return \Illuminate\Http\Response
     */
    public function edit(WhyUk $whyUk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WhyUk  $whyUk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WhyUk $whyUk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WhyUk  $whyUk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $why = WhyUk::findOrFail($id);
        $file = $why->image;

        if(is_file($file))
        {
            File::delete($file);
        }
        $why->delete();
        return redirect()->back()->withSuccessMessage('Information Deleted');
    }
}
