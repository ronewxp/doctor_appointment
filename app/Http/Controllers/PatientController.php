<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    public function index()
    {
        //Gate::authorize('app.dashboard');
        $users = User::where('role_id',2)->get();
        return view('patient.patientList',compact('users'));
    }
}
