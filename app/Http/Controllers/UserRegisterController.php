<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    //
    public function showRegistrationForm()
    {
    	return view('forms.registerForm');
    }
}
