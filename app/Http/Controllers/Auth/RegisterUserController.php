<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(StoreRequest $request) {
        $user = User::create($request->validated());
        event(new Registered($user));
        Auth::login($user);
        return redirect()->route('verification.notice', compact('user'));
    }
}
