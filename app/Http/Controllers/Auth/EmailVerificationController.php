<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        return view('auth.verify-email', compact('user'));
    }
}
