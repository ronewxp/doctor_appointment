<?php

namespace App\Http\Controllers;



use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        Gate::authorize('app.dashboard');

        $doctors = User::where('role_id',3)->get();

        $patient = User::where('role_id',2)->get();

        return view('dashboard',compact('doctors','patient'));
    }
}
