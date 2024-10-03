<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TwoFactorController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $code = rand(1000000, 9999999);
        $user->two_factor_code = $code;
        $user->save();

        Mail::raw('Your verification code is: ' . $code, function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Verification code');
        });

        return view('auth.two_factor');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);

        $user = Auth::user();
        if ($user->two_factor_code == $request->code) {
            $user->two_factor_code = null;
            $user->save();

            session(['two_factor_authenticated' => true]);
            return redirect('admin/dashboard');
        } else {
            return redirect()->back()->with('error', 'Incorrect code. Please try again.');
        }
    }
}
