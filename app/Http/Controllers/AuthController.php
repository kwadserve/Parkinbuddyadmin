<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
       
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $remember = $request->has('remember');
             
        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();
            $userData = User::with('role')->where("id",$user['id'])->first();
                
            if ($userData['role']['role'] == 'admin' || $userData['role']['role'] == 'manager') {
                return redirect()->to('/pb-admin/dashboard');
            } else {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('login')->with('message', "Sorry, Only Admin and Manager can login.");
            }         
        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ]);
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);

        $user = User::create(request(['name', 'email', 'password']));

        auth()->login($user);

        event(new Registered($user));

        if(Auth::check()){
            $user_meta = new UserMeta();
            $user_meta->user_id = Auth::id();
            $user_meta->avatar = 'avatar.jpg';
            $user_meta->about = 'Write about yourself...';
            $user_meta->gender = 'male';
            $user_meta->location = 'INDIA';
            $user_meta->cover_photo = 'ad-l-bx.jpg';

            $user_meta->save();
        }

        return redirect()->to('/email/verify');
    }

    public function verify()
    {
        return view('verify');
    }

    public function verify_email(EmailVerificationRequest $request) {
        $request->fulfill();
        Mail::to(Auth::user())->send(new SuccessfullyRegistered());

        return redirect('/');
    }

    public function email_resend() {
        Auth::user()->sendEmailVerificationNotification();
     
        return back()->with('message', 'Verification link sent!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();

        return redirect()->to('/pb-login');
    }

    public function forgot_password()
    {
        return view('forgot_pass');
    }

    public function email_password(Request $request)
    {
        $request->validate(['email' => 'required|email']);
     
        $status = Password::sendResetLink(
            $request->only('email')
        );
     
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function reset_password($token)
    {
        return view('reset_password', ['token' => $token]);
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
     
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
     
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'password' => 'bail|required|password',
            'newpassword' => 'bail|required',
            'renewpassword' => 'bail|required|same:newpassword'
        ]);

        $user = Auth::user();
        $user->update([
            'password' => $request['newpassword']
        ]);
        return redirect('yn-author');
    }
}