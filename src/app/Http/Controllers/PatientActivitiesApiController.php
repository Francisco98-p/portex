<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\PatientActivity;

class PatientActivitiesApiController extends Controller
{
    public function getPatientActivities(string $code)
    {
        $patient = Patient::where('codigo', $code)->first();
        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }
        $activities = PatientActivity::where('patient_id', $patient->id)->with('activity')->get();
        $activities = $this->hidePatientActivitesResponseFields($activities);
        $patient = $this->hidePatientResponseFields($patient);
        $response = [
            'patient' => $patient,
            'activities' => $activities
        ];
        return response()->json($response);
    }

    private function hidePatientResponseFields($patient)
    {
        return [
            'nombres' => $patient->nombres,
            'apellidos' => $patient->apellidos,
            'nacimiento' => $patient->nacimiento,
            'sexo' => $patient->sexo,
            'telefono' => $patient->telefono,
        ];
    }

    private function hidePatientActivitesResponseFields($patientActivities)
    {
        return $patientActivities->map(function ($patientActivity) {
            return [
                'activity_id' => $patientActivity->activity->id,
                'activity_name' => $patientActivity->activity->name,
                'activity_description' => $patientActivity->activity->description,
                'activity_thumbnail' => $patientActivity->activity->thumbnail,
                'description' => $patientActivity->description,
                'reasons' => $patientActivity->reasons,
                'goals' => $patientActivity->goals,
                'indicators' => $patientActivity->indicators,
            ];
        });
    }
}
