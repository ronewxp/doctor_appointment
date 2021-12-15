<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('appointment.index');

        $appointment = Appointment::orderBy('id', 'DESC')->get();

        return view('appointment.index',compact('appointment'));

    }

    public function myAppointment()
    {
        Gate::authorize('myAppointment');
        $user=Auth::id();
        $appointment = Appointment::where('user_id',$user)->get();
        //dd($appointment);

        return view('appointment.myAppointment',compact('appointment'));

    }

    public function DoctorAppointment()
    {
        Gate::authorize('doctorAppointment');
        $user=Auth::id();
        $appointment = Appointment::where('doctor_id',$user)->get();
        //dd($appointment);

        return view('appointment.doctorAppointment',compact('appointment'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users= User::Userlist();
        $doctors= User::Doctorlist();
        //dd($doctor);
        return view('appointment.create',compact('users','doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        Gate::authorize('appointment.create');

        $date = str_replace('/', '-', $request->input('date'));
        // create the mysql date format
        //$appointmentDate= Carbon::createFromFormat('Y-m-d', $date);
        $newDate = Carbon::parse($date)->format('Y-m-d H:i');

        //dd($newDate);
        $this->validate($request,[
            'user_id' => 'required|integer',
            'doctor_id' => 'required|integer',
            'date' => 'required',
        ]);

        $appointment = Appointment::create([
            'user_id'=>$request->user_id,
            'doctor_id'=>$request->doctor_id,
            'date'=>$newDate,
            'status'=>$request->filled('status')
        ]);
        notify()->success('Appointment Successfully Added.', 'Added');
        return redirect()->route('myAppointment');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Gate::authorize('appointment.create');

        $doctors = User::findOrFail($id);
        $user= Auth::user();
        return view('appointment.form',compact('doctors','user'));
    }

    public function showDetails($id)
    {
        Gate::authorize('appointment.details');

        $doctors = User::findOrFail($id);
        $user= Auth::user();
        return view('appointment.details',compact('doctors','user'));
    }

    public function showPatient($id)
    {
        Gate::authorize('appointment.details');

        $user= User::findOrFail($id);
        $doctors= Auth::user();
        $appointment= Appointment::findOrFail($id);
        return view('appointment.detailsPatient',compact('doctors','user','appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        $user= User::findOrFail($appointment->user_id);
        $doctors= Auth::user();
        return view('appointment.edit',compact('doctors','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
