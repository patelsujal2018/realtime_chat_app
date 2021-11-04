<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\User;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
           'email' => 'required|email|max:100',
           'password' => 'required|min:8|max:30'
        ]);

        $userList = User::where(['email'=>$request->email])->get();
        if(!empty($userList) && count($userList)>0)
        {
            $user = $userList->first();
            if(!empty($user->email_verified_at) && $user->email_verified_at != "")
            {
                if(Hash::check($request->password, $user->password))
                {
                    if( Auth::attempt(['email' => $request->email, 'password' => $request->password]) )
                    {
                        if(Auth::check())
                        {
                            $notification = ['message'=>"user authenticate successfully",'type'=>'danger'];
                            return redirect()->route('account.dashboard');
                        }
                    }
                    else
                    {
                        $notification = ['message'=>"authentication failed",'type'=>'danger'];
                        return redirect()->route('auth.login.page')->with($notification);
                    }
                }
                else
                {
                    $notification = ['message'=>"credentials wrong",'type'=>'danger'];
                    return redirect()->route('auth.login.page')->with($notification);
                }
            }
            else
            {
                $notification = ['message'=>"your account is not verifed yet",'type'=>'danger'];
                return redirect()->route('auth.login.page')->with($notification);
            }
        }
        else
        {
            $notification = ['message'=>"record not found",'type'=>'danger'];
            return redirect()->route('auth.login.page')->with($notification);
        }
    }

    public function registrationPage()
    {
        return view('auth.registration');
    }

    public function registrationProcess(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|max:100',
            'mobile' => 'required|numeric|digits:10',
            'password' => 'required|min:8|max:30|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(10);
        $remember_token = Hash::make($user->remember_token);

        if($user->save()){
            $data['name'] = $user->name;
            $data['email'] = $user->email;
            $data['verify_link'] = route('auth.verify.register',['email'=>$user->email,'token'=>$remember_token]);

            dispatch(new \App\Jobs\RegistrationVerificationJob($data));

            $notification = ['message'=>"Your registration completed successfully. Please check you inbox to verify your account",'type'=>'success'];
            return redirect()->route('auth.register.page')->with($notification);
        }
    }

    public function verifyRegistrationProcess($email,$token)
    {
        $users = User::where('email',$email)->get();

        if(count($users) > 0){
            $user = $users->first();

            $currentDateTime = Carbon::now();
            $tokenDateTime = Carbon::parse($user->created_at);

            $diff_hours = $tokenDateTime->diffInHours($currentDateTime);

            if(!empty($user) && $user->remember_token != "" && $diff_hours < 2){
                if(Hash::check($user->remember_token,$token)){
                    $user->email_verified_at = now();
                    $user->remember_token = "";
                    if($user->save()){
                        return "your email is verified thank you for registration";
                    }
                } else {
                    return "token is not valid";
                }
            } else {
                return "this link is expired";
            }
        } else {
            return "no user with this email";
        }
    }

    public function logoutProcess(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('auth.login.page');
    }
}
