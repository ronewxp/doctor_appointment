<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('prescription.index');
        $prescription= Prescription::all();

        return view('prescription.index',compact('prescription'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('prescription.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('prescription.create');

        $this->validate($request,[
            'user_id' => 'required|integer',
            'doctor_id' => 'required|integer',
            'date' => 'required',
            'advice'=>'required',
            'medicine'=>'required',
        ]);

        $prescription = Prescription::create([
            'user_id'=>$request->user_id,
            'doctor_id'=>$request->doctor_id,
            'date'=>$request->date,
            'examination'=>$request->examination,
            'lab_tests'=>$request->lab_tests,
            'advice'=>$request->advice,
            'medicine'=>$request->medicine,

        ]);
        notify()->success('Prescription Successfully Added.', 'Added');
        return redirect()->route('prescription.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        Gate::authorize('prescription.create');

        $doctors = Auth::user();
        $user= User::findOrFail($id);
        return view('prescription.form',compact('doctors','user'));
    }

    public function showPrescription(Prescription $prescription)
    {
        //dd($prescription);
        return view('prescription.presscription',compact('prescription'));
    }

    public function DownloadPrescription(Prescription $prescription)
    {
        // selecting PDF view
        $pdf = PDF::loadView('prescription.presscription',compact('prescription'))->setOptions(['defaultFont' => 'Arvo']);
        //dd($pdf);->setOptions(['defaultFont' => 'sans-serif'])
        //set_time_limit(300);
        return $pdf->download('prescription.pdf');
    }

    public function MyPrescription()
    {
        Gate::authorize('myPrescription');
        $user=Auth::id();
        $prescription = Prescription::where('user_id',$user)->get();
        return view('prescription.myPrescription',compact('prescription'));
    }

    public function DoctorPrescription()
    {
        Gate::authorize('doctorPrescription');
        $user=Auth::id();
        $prescription = Prescription::where('doctor_id',$user)->get();
        return view('prescription.doctorPrescription',compact('prescription'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescription $prescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescription $prescription)
    {
        //
    }
}
