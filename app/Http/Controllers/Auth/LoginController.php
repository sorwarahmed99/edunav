<?php
  
namespace App\Http\Controllers\Auth;
   
use App\User;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
  
    use AuthenticatesUsers;
  
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo = '/home';


   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
   
    public function login(Request $request)
    {   
        $input = $request->all();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('studentPortal');
            }
        }else{
            return $this->sendFailedLoginResponse($request);
        }
          
    }

    public function redirectToProvider()
    {
     return Socialite::driver('facebook')->redirect();
    }
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();
        //dd($user);

        $user = User::firstOrCreate([
            'name'     => $user->getName(),
            'email'    => $user->getEmail(),
            'provider_id' => $user->getId(),
        ]);

        Auth::Login($user,true);
        return \redirect('/student-portal');
    }

    public function redirectToProviderGoogle()
    {
     return Socialite::driver('google')->redirect();
    }
    
    public function handleProviderCallbackGoogle()
    {
        $user = Socialite::driver('google')->stateless()->user();
        //dd($user);

        $user = User::firstOrCreate([
            'name'     => $user->getName(),
            'email'    => $user->getEmail(),
            'provider_id' => $user->getId(),
        ]);

        Auth::Login($user,true);
        return \redirect('/student-portal');
    }


    


}