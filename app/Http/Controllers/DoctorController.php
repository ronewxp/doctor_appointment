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
        Gate::authorize('doctor_list');
        $doctors = User::where('role_id',3)->get();
        return view('doctor.doctorList',compact('doctors'));
    }

    public function DoctordDashboard()
    {
        Gate::authorize('doctor_dashboard');
        $doctors = User::where('role_id',3)->get();

        $patient = User::where('role_id',2)->get();

        return view('doctor.doctor_dashboard',compact('doctors','patient'));
    }


}
