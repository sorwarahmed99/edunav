<?php

namespace App\Http\Controllers;

use App\Faq;
use App\News;
use App\About;
use App\WhyUk;
use App\Client;
use App\Slider;
use App\Contact;
use App\HowItWorks;
use App\University;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PublicController extends Controller
{
    public function notificationFetch(Request $request)
    {
        $output = '';   
        if($request->view) {
            if($request->view != '') {
                    $update = Notification::select('id','is_seen','to')
                    ->where('to',Auth::user()->id)->where('is_seen',0)
                    ->update(array(
                                    'is_seen' => 1
                                ));
            }

            $notifis = Notification::where('to',Auth::user()->id)->orderBy('created_at','desc')->limit(3)->get();
            foreach($notifis as $not)
            {   
                $output = '
                                <div>
                                <div class="small text-gray-500">'.$not->created_at.'</div>
                                <span class="font-weight-bold">'.$not->about.'</span>
                                <br>
                                <span class="text-danger"></span>

                                </div>
                            ';

                // $output = '<li>
                //         <a href="#">
                //         <strong>'.$not->about.'</strong><br />
                //         <small><em>'.$not->created_at.'</em></small>
                //         </a>
                //     </li>
                //     <li class="divider"></li>';
            }

            
            
        }

            $count = Notification::where('to',Auth::user()->id)->where('is_seen',0)->count();

            $data = array(
            'notification'   => $output,
            'unseen_notification' => $count
            );

            echo json_encode($data);

        

    } 
    public function index()
    {
        if (session('success_message')) {
            Alert::success(session('success_message'));
        }
        if(Auth::check())
        {
            $notifis = Notification::where('to',Auth::user()->id)->orderBy('created_at','desc')->limit(3)->get();
        } else {
            $notifis = '';
        }

        $universities = University::all();
        $newses = News::orderBy('created_at','asc')->limit(3)->get();
        $sliders = Slider::orderBy('created_at','asc')->limit(3)->get();
        $clients = Client::orderBy('created_at','asc')->limit(3)->get();
        return view('welcome',compact('newses','sliders','universities','clients','notifis'));
    }

    public function howitworks(){
        if(Auth::check())
        {
            $notifis = Notification::where('to',Auth::user()->id)->orderBy('created_at','desc')->limit(3)->get();
        } else {
            $notifis = '';
        }

        $hows = HowItWorks::orderBy('created_at','desc')->limit(1)->get();
        return view('howitworks',\compact('hows','notifis'));
    }

    public function whyUk(){
        if(Auth::check())
        {
            $notifis = Notification::where('to',Auth::user()->id)->orderBy('created_at','desc')->limit(3)->get();
        } else {
            $notifis = '';
        }
        $whys = WhyUk::orderBy('created_at','desc')->limit(1)->get();
        return view('whyUk',\compact('whys','notifis'));
    }

    public function faq(){
        if(Auth::check())
        {
            $notifis = Notification::where('to',Auth::user()->id)->orderBy('created_at','desc')->limit(3)->get();
        } else {
            $notifis = '';
        }
        $faqs = Faq::orderBy('created_at','desc')->get();
        return view('faq',compact('faqs','notifis'));
    }

    public function about(){
        $abouts = About::orderBy('created_at','desc')->limit(1)->get();

        if(Auth::check())
        {
            $notifis = Notification::where('to',Auth::user()->id)->orderBy('created_at','desc')->limit(3)->get();
        } else {
            $notifis = '';
        }
        return view('about',\compact('notifis','abouts'));
    }

    public function contact(){

        if (session('success_message')) {
			Alert::success(session('success_message'));
        }

        if(Auth::check())
        {
            $notifis = Notification::where('to',Auth::user()->id)->orderBy('created_at','desc')->limit(2)->get();
        } else {
            $notifis = '';
        }
        
        return view('contact',\compact('notifis'));
    }


    public function contactForm(Request $request){
        $validation = $request->validate([
			'name' => 'required|string',
			'email' => 'required|email',
			'subject' => 'required',
			'message' => 'required',
        ]);
        
        $contact = new Contact;
        $contact->name = $request['name'];
        $contact->email = $request['email'];
        $contact->subject = $request['subject'];
        $contact->message = $request['message'];
        $contact->is_replied = 0;
        $contact->is_seen = 0;
        $contact->save();
        
        return redirect()->back()->withSuccessMessage('<p class="text-muted" style="font-size:17px;">Thank you for contacting us. <br> We will get back to you as soon as possible !</p>');
    }

    public function newsSingle(News $news,$slug){
        if(Auth::check())
        {
            $notifis = Notification::where('to',Auth::user()->id)->orderBy('created_at','desc')->limit(2)->get();
        } else {
            $notifis = '';
        }
        return view('singlePost',\compact('news','notifis'));
    }
    

    public function privecy()
    {
        if(Auth::check())
        {
            $notifis = Notification::where('to',Auth::user()->id)->orderBy('created_at','desc')->limit(2)->get();
        } else {
            $notifis = '';
        }

        return view('privecy',\compact('notifis'));
    }

    public function termsAndCondition()
    {
        if(Auth::check())
        {
            $notifis = Notification::where('to',Auth::user()->id)->orderBy('created_at','desc')->limit(2)->get();
        } else {
            $notifis = '';
        }

        return view('termsAndCondition',\compact('notifis'));
    }


    
}
