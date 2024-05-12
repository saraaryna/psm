<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // Check the user's role and redirect accordingly
        if ($user->role === 'Student') {
            return redirect('/Student');
        } elseif ($user->role === 'Admin') {
            return redirect('/Admin');
        } else {
            // Handle other roles or scenarios
            return redirect($this->redirectTo);
        }
    }
}
