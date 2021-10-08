<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        //Gate::authorize('app.dashboard');
        $doctors = User::where('role_id',3)->get();
        return view('welcome',compact('doctors'));
    }
}
