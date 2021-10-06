<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DoctorController extends Controller
{
    public function index()
    {
        //Gate::authorize('app.dashboard');
        $users = User::where('role_id','=',3)->get();
        return view('doctor.doctorList',compact('users'));
    }

    public function DoctordDashboard()
    {
        //Gate::authorize('app.dashboard');
        return view('doctor.doctor_dashboard');
    }


}
