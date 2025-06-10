<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\Sendmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;



class MailController extends Controller
{
    public function index(Request $request)
    {
        return view('mail.index');
    }

    public function forgetPassword(Request $request)
    {

        $request->validate(['email' => 'required|email|exists:users']);

        $email = DB::table('password_reset_tokens')->where('email', $request->email)->first();
        if ($email) {
            return redirect()->back()->withErrors(['error' => 'Password recovery email has already been sent.']);
        }
        $token = str()->random(64);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

//        ارسال ایمیل با صف
        Sendmail::dispatch($token,$request->email);

        return redirect()->back()->with('status', 'ایمیل بازیابی رمز عبور با موفقیت ارسال شد.');


    }

    public function resetpassword($token)
    {
        return view('mail.resetpassword', compact('token'));
    }

    public function resetpasswordPost(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $passwordreset = DB::table('password_reset_tokens')->where([
            'token' => $request->token,
        ])->first();

        if (!$passwordreset) {
            return redirect()->back()->withErrors(['error' => 'Invalid token.']);
        }
        User::where('email', $passwordreset->email)->update([
            'password' => Hash::make($request->password)
        ]);
        DB::table('password_reset_tokens')->where([
            'token' => $request->token,
        ])->delete();

        return redirect()->route('login');

    }


}
