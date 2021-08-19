<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class ClientController extends Controller
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

        $clients = Client::orderBy('created_at','desc')->paginate(10);
        return \view('admin.clients',compact('clients'));
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

        return \view('admin.addClients');
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
            'client_name' => 'required',
            'designation' => 'required',
            'image' => 'required',
            'message' => 'required',
        ]);

        $news = new Client;

        $news->client_name = $request['client_name'];
        $news->designation = $request['designation'];
        $news->message = $request['message'];
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

        return back()->withSuccessMessage('Clients feedbacks Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = Client::findOrFail($id);
        $file = $news->image;
        if(is_file($file))
        {
            File::delete($file);
        }
        $news->delete();
        return redirect()->back()->withSuccessMessage('Client Deleted');
    }
}
