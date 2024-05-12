<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/Student';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'studentID' => ['required', 'string', 'max:255', 'unique:users'],
            'ic' => ['required', 'string', 'max:255'],
            'program' => ['required', 'string', 'max:255'],
            'year' => ['required', 'in:1,2,3,4,5'], // Validate against enum values
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'studentID' => $data['studentID'],
            'email' => $data['email'],
            'ic' => $data['ic'],
            'program' => $data['program'],
            'faculty' => 'Faculty of Computing', // Default value for faculty
            'year' => $data['year'],
            'password' => Hash::make($data['password']),
        ]);
    }

  
}
