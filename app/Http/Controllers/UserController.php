<?php

namespace App\Http\Controllers;

use File;
use App\User;
use Carbon\Carbon;
use App\Notification;
use App\StudentPosrtal;
use App\WorkExperience;
use App\StudentDocument;
use App\StudentEducation;
use App\StudentInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function studentPortal(){
        if(Auth::check())
        {
            $notifis = Notification::where('to',Auth::user()->id)->orderBy('created_at','desc')->limit(3)->get();
        } else {
            $notifis = '';
        }
        $ucheck = StudentInformation::where('user_id',Auth::user()->id)->first();
            if (empty($ucheck)) {
                $ucheck = 0;
            } else {
                $ucheck = 1;
            }
        $portals = StudentPosrtal::orderBy('created_at','desc')->limit(1)->get();
        return \view('student.studentPortal',\compact('notifis','portals','ucheck'));
    }
    public function introductoryPhase()
    {

        if(Auth::check())
        {
            $notifis = Notification::where('to',Auth::user()->id)->orderBy('created_at','desc')->limit(2)->get();
        } else {
            $notifis = '';
        }

        if (session('success_message')) {
            Alert::html('<h1>Thank you</h1>',"
            <h3>For submitting your information </h3><h4><a href='/intermediate-phase' class='btn btn-primary'> <i class='fa fa-arrow-right'></i> Click here</a> <br> to go next phase ?</h4>  
                ",'success')->footer('<a href="#">...</a>')->autoClose(false);  
            }

            $ucheck = StudentInformation::where('user_id',Auth::user()->id)->first();
            if (empty($ucheck)) {
                $ucheck = 0;
            } else {
                $ucheck = 1;
            }

           // dump($ucheck);

        return \view('student.introductoryPhase',\compact('notifis','ucheck'));
    }

    public function intermediatePhase()
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

        $ucheck = StudentInformation::where('user_id',Auth::user()->id)->first();
            if (empty($ucheck)) {
                $ucheck = 0;
            } else {
                $ucheck = 1;
            }

        return \view('student.intermediatePhase',\compact('notifis','ucheck'));
    }

    public function transitionPhase()
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

        $ucheck = StudentInformation::where('user_id',Auth::user()->id)->first();
            if (empty($ucheck)) {
                $ucheck = 0;
            } else {
                $ucheck = 1;
            }

        return \view('student.transitionPhase',\compact('notifis','ucheck'));
    }

    public function terminalPhase()
    {
        if(Auth::check())
        {
            $notifis = Notification::where('to',Auth::user()->id)->orderBy('created_at','desc')->limit(2)->get();
        } else {
            $notifis = '';
        }

        $ucheck = StudentInformation::where('user_id',Auth::user()->id)->first();
            if (empty($ucheck)) {
                $ucheck = 0;
            } else {
                $ucheck = 1;
            }

        return \view('student.terminalPhase',\compact('notifis','ucheck'));
    }
    
    public function profile()
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
        
        $students = StudentInformation::where('user_id','=',Auth::user()->id)->orderBy('created_at','desc')->limit(1)->get();
        $files = StudentDocument::where('user_id','=',Auth::user()->id)->get(); 
        
        return \view('student.profile',\compact('files','students','notifis'));
    }

    public function studentinformationUpdate()
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

        $edus = StudentEducation::where('user_id',Auth::user()->id)->get();   
        $eduCount = StudentEducation::where('user_id',Auth::user()->id)->count();  
        $eduCount = 5 - $eduCount;

        $workCount = WorkExperience::where('user_id',Auth::user()->id)->count();
        $workCount = 5 - $workCount;

        $students = StudentInformation::where('user_id','=',Auth::user()->id)->orderBy('created_at','desc')->limit(1)->get();
        $files = StudentDocument::where('user_id','=',Auth::user()->id)->get();
        return \view('student.studentinformationUpdate',\compact('files','students','notifis','edus','eduCount','workCount'));
    }




    public function personalInfoUpdate(Request $request,$id)
    {
        $user = StudentInformation::findOrFail($id);

        $user->fullname = $request['fullname'];
        $user->dob = $request['dob'];
        $user->nationality = $request['nationality'];
        $user->country_of_recidency = $request['country_of_recidency'];
        $user->address = $request['address'];
        $user->phone = $request['phone'];
        $user->email = $request['email'];
        $user->save();
        
        

        if ($request->hasFile('profile_image')) {
            
            $file = $user->profile_image;
            if(is_file($file))
            {
                File::delete($file);
            }
            $user->profile_image = $request['profile_image'];
            $profile_image = $request->file='true';

            $profile_image = $request->file('profile_image');
            $fileName = $profile_image->getClientOriginalName();
            $fileExtension = $profile_image->getClientOriginalExtension();

            $profile_image->move('uploads/', $fileName);

            $user->profile_image = 'uploads/' . $fileName;
            $user->save();
        }
        
        return \redirect()->back()->withSuccessMessage('personal information updated');
        
    }

    public function changePassword(Request $request,$id)
    {
            $user = User::findOrFail($id);
            
            if (!(Hash::check($request['password'],Auth::user()->password))) {
                return redirect()->back()->with('error',"Your current password does not match with password you provided.");
            }

             if (strcmp($request['password'], $request['new_password']) == 0) {
                return redirect()->back()->with('error',"New password can not be same as your current password.");
            }
            
            $validation = $request->validate([
                'new_password' => ['required', 'string', 'min:6'],
                'new_password_confirmation' => ['required','string', 'min:6'],
            ]);

            if($request['new_password'] != $request['new_password_confirmation']){
                return redirect()->back()->with('error',"New password & confirm password does not matched");
            }

            $user->password = bcrypt($request['new_password']);
            $user->save();

            return redirect()->back()->withSuccessMessage('Password changed successfully');
    }


    public function EducationInfoUpdate(Request $request)
    {
        
        $degreesUp = $request['degree'];

        foreach ($degreesUp as $edu => $v) {
           if (!empty($degreesUp[$edu])) {
               if (!empty($request->degree[$edu]) && !empty($request->institution[$edu]) && !empty($request->passing_year[$edu]) && !empty($request->cgpa[$edu])) 
               {
                    $data = array(
                        'degree' => $request->degree[$edu],
                        'institution' => $request->institution[$edu],
                        'passing_year' => $request->passing_year[$edu],
                        'cgpa' => $request->cgpa[$edu],
                    );
                    StudentEducation::where('id',$request->id[$edu])->update($data);
               } else {
                   return back()->with('error','All Educational information must be filled up properly !');
               }
           }
        }

        
        $degrees = $request['degree_add'];

        foreach ($degrees as $edu => $v) {
           if (!empty($degrees[$edu])) {
               if (!empty($request->degree_add[$edu]) && !empty($request->institution_add[$edu]) && !empty($request->passing_year_add[$edu]) && !empty($request->cgpa_add[$edu])) 
               {
                    $data = array(
                        'user_id' => Auth::user()->id,
                        'degree' => $request->degree_add[$edu],
                        'institution' => $request->institution_add[$edu],
                        'passing_year' => $request->passing_year_add[$edu],
                        'cgpa' => $request->cgpa_add[$edu],
                        'created_at' => Carbon::now()
                    );
                    StudentEducation::insert($data);
               } else {
                   //echo "All Educational information must be filled up properly !";
                   return back()->with('error','All Educational information must be filled up properly !');
               }
           }
        }

        return back()->with('success','Educational background information updated.');
    }


    public function ieltsInfoUpdate(Request $request)
    {
        if($request->is_ielts)
        {
            $validation = $request->validate([
                'ielts_validity' => ['required'],
                'ielts_score' => ['required'],
            ]);

            $user = StudentInformation::where('user_id',Auth::user()->id)->first();
            $user->is_ielts = 1;
            $user->ielts_validity = $request['ielts_validity'];
            $user->ielts_score = $request['ielts_score'];
            $user->save();
        } else {
            $user = StudentInformation::where('user_id',Auth::user()->id)->first();
            $user->ielts_validity = $request['ielts_validity'];
            $user->ielts_score = $request['ielts_score'];
            $user->save();
        }

        return back()->withSuccessMessage('Ielts information updated.');

    }
    

    public function workExperienceInfoUpdate(Request $request)
    {
        $work_experiences = $request['work_experience'];
        foreach($work_experiences as $work => $value){
            if (!empty($work_experiences[$work])) {
                if (!empty($request->work_experience[$work]) && !empty($request->year[$work])) 
                {
                        $data = array(
                            'work_experience' => $request->work_experience[$work],
                            'year' => $request->year[$work],
                        );

                        WorkExperience::where('id',$request->id[$work])->update($data);
                        //return back()->withSuccessMessage('Work Experience Updated.');
                } else {
                    return back()->withErrors('Work Experience must be filled up properly !');
                }
            }
        }

        $work_experiences_add = $request['work_experience_add'];

        foreach($work_experiences_add as $work => $value){
            if (!empty($work_experiences_add[$work])) {
                if (!empty($request->work_experience_add[$work]) && !empty($request->year_add[$work])) 
                {
                        $data = array(
                            'user_id' => Auth::user()->id,
                            'work_experience' => $request->work_experience_add[$work],
                            'year' => $request->year_add[$work],
                            'created_at' => Carbon::now()
                        );
                        WorkExperience::insert($data);
                        
                } else {
                    return back()->withErrors('Work Experience must be filled up properly !');
                }
            }
        }

        return back()->withSuccessMessage('Work Experience Updated.');
    }
    public function OtherInfoUpdate(Request $request)
    {
        $stu = StudentInformation::where('user_id',Auth::user()->id)->first();
        $stu->intended_course = $request['intended_course'];
        $stu->intended_university = $request['intended_university'];
        $stu->others = $request['others'];
        $stu->save();
        return back()->withSuccessMessage('Other information Updated.');
    }
    
}
