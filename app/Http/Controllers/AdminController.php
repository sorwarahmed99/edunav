<?php

namespace App\Http\Controllers;

use App\User;
use App\Admin;
use App\Contact;
use App\StudentDocument;
use App\StudentInformation;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
	{
		$this->middleware('IsAdmin:is_admin');
	}

    public function index()
    {
        return \view('admin.dashboard');
    }
    // ------P R F I L E
    public function profile(){

        if (session('success_message')) {
            Alert::success(session('success_message'))->toToast()->position('center-end');
        }

        return view('admin.profile');
    }

    public function profileUpdate(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|string',
            'phone' => 'required',
            'email' => 'required',
        ]);

        DB::beginTransaction(); //transaction start
        if ($request->hasFile('profile_image')) {
            if(File::exists(Auth::user()->profile_image)) {
                File::delete(Auth::user()->profile_image);
            }
        }

        $user = Auth::user();

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->nid = $request['nid'];
        $user->country = $request['country'];
        $user->gender = $request['gender'];
        $user->address = $request['address'];

        if ($request->hasFile('profile_image')) {
            $user->profile_image = $request['profile_image'];
            $profile_image = $request->file='true';

            $profile_image = $request->file('profile_image');
            $fileName = $profile_image->getClientOriginalName();
            $fileExtension = $profile_image->getClientOriginalExtension();

            $profile_image->move('uploads/admin_profile/', $fileName);

            $user->profile_image = 'uploads/admin_profile/' . $fileName;
        }

        $user->save();
        DB::commit(); //transaction end

        return redirect()->back()->withSuccessMessage('Profile Updated');
    }

    public function changePassword(Request $request,$id)
    {
        $user = Admin::findOrFail($id);
        
        if (!(Hash::check($request['password'],Auth::user()->password))) {
            return redirect()->back()->with('error',"Your current password does not match with password you provided.");
        }

        if (strcmp($request['password'], $request['new_password']) == 0) {
            return redirect()->back()->with('error',"New password can not be same as your current password.");
        }

        $validation = $request->validate([
            'new_password' => ['required', 'string', 'min:8'],
            'new_password_confirmation' => ['required','string', 'min:8'],
        ]);

        if($request['new_password'] != $request['new_password_confirmation']){
            return redirect()->back()->with('error',"New password & confirm password does not matched");
        }
        
        $user->password = bcrypt($request['new_password']);
        $user->save();

        return redirect()->back()->withSuccessMessage('Password changed successfully');
    }

    // -------U S E R S
    public function allUsers()
    {
        if (session('success_message')) {
            Alert::success(session('success_message'))->toToast()->position('center-end');
        }

        $users = User::where('is_admin',0)->orderBy('created_at','desc')->paginate(20);
        return view('admin.allUsers',compact('users'));
    }

    public function blockUserList()
    {
        if (session('success_message')) {
            Alert::success(session('success_message'))->toToast()->position('center-end');
        }

        $users = User::where('status', 0)->orderBy('created_at','desc')->paginate(10);
        return view('admin.blockUserList',compact('users'));
    }

    public function blockUser($id)
    {
        $user = User::findOrFail($id);
        if($user->status == 0){
            $user->status = 1;
            $user->save();
            return redirect()->back()->withSuccessMessage('User Unblocked');
        }else{
            $user->status = 0;
            $user->save();
            return redirect()->back()->withSuccessMessage('User Blocked');
        }
    }

// -----------------------S T U D E N T S

    public function students()
    {
        if (session('success_message')) {
            Alert::success(session('success_message'))->toToast()->position('center-end');
        }
        $students = StudentInformation::orderBy('created_at','desc')->paginate(20);
        return \view('admin.students',\compact("students"));
    }

    public function showInformation($id)
    {
        if (session('success_message')) {
            Alert::success(session('success_message'))->toToast()->position('center-end');
        }
        
        $student = User::findOrFail($id);
        return \view('admin.showInformation',\compact('student'));
    }

    public function studentsDocuments()
    {
        $students = StudentInformation::orderBy('created_at','desc')->paginate(20);
        return \view('admin.students',\compact("students"));
    }

    public function acceptedStudents()
    {
        $students = StudentInformation::where('status',1)->orderBy('created_at','desc')->paginate(20);
        return \view('admin.acceptedStudents',\compact("students"));
    }

    public function rejectedStudents()
    {
        $students = StudentInformation::where('status',2)->orderBy('created_at','desc')->paginate(20);
        return \view('admin.rejectedStudents',\compact("students"));
    }

    
    
    public function manageAdmin(){

        if (session('success_message')) {
            Alert::success(session('success_message'))->toToast()->position('center-end');
        }

        $admins = User::where('is_admin',1)->orderBy('created_at','desc')->paginate(10);
        return view('admin.manageAdmin',compact('admins'));
    }

    public function addAdmin()
    {
        if (session('success_message')) {
            Alert::success(session('success_message'))->toToast()->position('center-end');
        }

        return view('admin.addAdmin');
    }

    public function addAdminStore(Request $request)
    {
    
    $validation = $request->validate([
        'name' => 'required',
        'email' => 'required|string|unique:users',
    ]);

    $password = rand(11111111,99999999);
    $admin = new User;
    
    $admin->name = $request['name'];
    $admin->email = $request['email'];
    $admin->password = bcrypt($password);
    $admin->is_admin =1;
    $admin->save();
    
    //  $details = [
    //     'name' => $request['name'],
    //     'email' => $request['email'],
    //     'password' => $password,
    // ];
    
    // Mail::to($admin->email)->send(new AdminEmail($details));

     return redirect()->back()->withSuccessMessage('New Admin Added Successfully');
    }

    public function deleteAdmin($id){

        $category = User::findOrFail($id)->delete();

        return redirect()->back()->withSuccessMessage('Admin Removed Successfully');
    }

    // ------------------ C O N T A C T S

	public function contacts()
	{
		if (session('success_message')) {
			Alert::success(session('success_message'))->toToast()->position('center-end');
		}

		$contacts = Contact::orderBy('created_at','desc')->paginate(20);
		return view('admin.contacts',compact('contacts'));
	}
	
	public function replyContact(Request $request, $id)
	{
		$contact = Contact::findOrFail($id);
		$contact ->is_replied = true;
		$contact->save();
		return redirect()->back()->withSuccessMessage('Contact Message Replied');
	}

	public function deleteContact($id)
	{
		$project = Contact::findOrFail($id)->delete();
		return redirect()->back()->withSuccessMessage('Contact Message Deleted');	
	}
	
    
}
