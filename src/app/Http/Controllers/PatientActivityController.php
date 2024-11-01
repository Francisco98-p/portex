<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Activity;
use App\Models\PatientActivity;
use App\Http\Requests\StorePatientActivityRequest;
use App\Http\Requests\UpdatePatientActivityRequest;

class PatientActivityController extends Controller
{
    public function index() {
        $patient_id = request()->get('patient_id');
        $patients = Patient::all();
        $patientActivities = PatientActivity::where('patient_id', $patient_id)->paginate(5);
        return view('patient-activities.index', compact('patientActivities', 'patients', 'patient_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patient_id = request()->get('patient_id');
        $patient = Patient::find($patient_id);
        $patient_full_name = $patient->apellidos . ', ' . $patient->nombres;
        $activities = Activity::all();
        return view('patient-activities.create', compact('activities', 'patient_id', 'patient_full_name'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientActivityRequest $request)
    {
        $user_id = auth()->user()->id;
        $patient_id = request()->get('patient_id');
        $validated = $request->validated();
        $validated['user_id'] = $user_id;
        $validated['patient_id'] = $patient_id;
        PatientActivity::create($validated);
        return redirect()->route('patient-activities.index', ['patient_id' => $patient_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PatientActivity $patientActivity)
    {
        return view('patient-activities.show', compact('patientActivity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PatientActivity $patientActivity)
    {
        $patient = $patientActivity->patient;
        $patient_full_name = $patient->apellidos . ', ' . $patient->nombres;
        $activities = Activity::all();
        return view('patient-activities.edit', compact('patientActivity', 'activities', 'patient_full_name'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientActivityRequest $request, PatientActivity $patientActivity)
    {
        $patient_id = $patientActivity->patient_id;
        $validated = $request->validated();
        $patientActivity->update($validated);
        return redirect()->route('patient-activities.index', ['patient_id' => $patient_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PatientActivity $patientActivity)
    {
        $patientActivity->delete();
        return redirect()->route('patient-activities.index', ['patient_id' => $patientActivity->patient_id]);
    }
}
