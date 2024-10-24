<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\EmailVerifificationRequest;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        return view('auth.verify-email', compact('user'));
    }

    public function create(EmailVerifificationRequest $request) {
        $request->user()->markEmailAsVerified();
        return view('auth.verified-email');
    }

    public function store(Request $request) {
        $user = $request->user();
        $user->sendEmailVerificationNotification();
        return redirect()->route('verification.notice')->with('message', trans('auth.verification.email_resent', ['email' => $user->email]));
    }
}
