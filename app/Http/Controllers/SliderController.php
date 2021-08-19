<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use File;
use RealRashid\SweetAlert\Facades\Alert;

date_default_timezone_set("Asia/Dhaka");

class SliderController extends Controller
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
        
        $sliders = Slider::all();
        return view('admin.sliders',compact('sliders'));
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

        return view('admin.addSlider');
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
			'slider_title' => 'required|string|max:220',
			'slider_description' => 'required',
			'slider_image' => 'required',
		]);

		$slider = new Slider;

		$slider->slider_title = $request['slider_title'];
		$slider->slider_description = $request['slider_description'];

		if($request->hasFile('slider_image')) {
            $filenamewithextension = $request->file('slider_image')->getClientOriginalName();
      
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            $extension = $request->file('slider_image')->getClientOriginalExtension();
      
            $filenametostore = $filename.'_'.time().'.'.$extension;
      
            $slider_image = $request->file('slider_image')->move('uploads/slider_image', $filenametostore);
            
			$slider->slider_image = 'uploads/slider_image/' . $filenametostore;
		}
		
		$slider->save();
		return redirect()->back()->withSuccessMessage('Slider Added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (session('success_message')) {
            Alert::success(session('success_message'))->toToast()->position('center-end');
        }

        $slider = Slider::findOrFail($id);
        return view('admin.editSlider',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
		$file = $slider->slider_image;
		if(is_file($file))
		{
			File::delete($file);
		}
		$slider->delete();
		return redirect()->back()->withSuccessMessage('Slider Deleted');
    }
}
