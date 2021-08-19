<?php

namespace App\Http\Controllers;

use App\User;
use App\Notification;
use App\StudentDocument;
use App\StudentInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    public function acceptPersonalInformation(Request $request,$id)
    {
        $doc = StudentInformation::findOrFail($id);
        $doc->status = 1;
        $doc->save();

        $notification = new Notification;
        $notification->to = $doc->user_id;
        $notification->about = 'Your personal information are Accepted';
        $notification->other_message = $request['message'];
        $notification->save();
        return \redirect()->back()->withSuccessMessage('personal information are Accepted');
    }

    public function acceptDocuments(Request $request, $id)
    {
        $doc = StudentDocument::findOrFail($id);
        $doc->status = 2;
        $doc->save();

        $file = $request['file_type'];

        $notification = new Notification;
        $notification->to = $doc->user_id;
        $notification->about = 'Your '. $file. ' Accepted';
        $notification->other_message = $request['message'];
        $notification->save();
        return \redirect()->back()->withSuccessMessage('Student '.$file.' Accepted');

    }

    
    public function rejectDocuments(Request $request, $id)
    {
        $doc = StudentDocument::findOrFail($id);
        $doc->status = 3;
        $doc->save();

        $notification = new Notification;
        $notification->to = $doc->user_id;
        $notification->about = 'Academic Documents Rejected';
        $notification->other_message = $request['message'];
        $notification->save();
        return \redirect()->back()->withSuccessMessage('Student Documents Rejected');

    }


    public function askForDocuments(Request $request, $id)
    {
        $user = User::FindOrFail($id);

        $notification = new Notification;
        $notification->to = $user->id;
        $notification->about = 'Counsellor asking to submit your '.$request['about'];
        $notification->other_message = $request['message'];
        $notification->save();
        return \redirect()->back()->withSuccessMessage('Student Documents Asked');
    }

    public function askForAcceptenceDocuments($id)
    {
        $user = User::FindOrFail($id);

        $notification = new Notification;
        $notification->to = $user->id;
        $notification->about = 'Asking for Confirmation of Acceptance for Studies (CAS)';
        $notification->save();
        return \redirect()->back()->withSuccessMessage('Student CAS Document Asked');
    }


    public function show()
    {
        if(Auth::check())
        {
            $notifis = Notification::where('to',Auth::user()->id)->orderBy('created_at','desc')->limit(3)->get();
        } else {
            $notifis = '';
        }

        $notifications = Notification::where('to',Auth::user()->id)->orderBy('created_at','desc')->paginate(20);
        return \view('student.allnotification',\compact('notifications','notifis'));
    }
}
