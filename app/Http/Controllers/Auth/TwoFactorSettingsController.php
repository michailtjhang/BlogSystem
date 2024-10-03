<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TwoFactorSettingsController extends Controller
{
    public function enable()
    {
        $user = Auth::user();
        $user->two_factor_enabled = true;
        $user->save();

        return redirect()->back()->with('status', 'Two-factor authentication enabled.');
    }

    public function disable()
    {
        $user = Auth::user();
        $user->two_factor_enabled = false;
        $user->two_factor_code = null; // Menghapus kode 2FA jika ada
        $user->save();

        session()->forget('two_factor_authenticated'); // Menghapus session 2FA

        return redirect()->back()->with('status', 'Two-factor authentication disabled.');
    }
}
