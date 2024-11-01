<?php

use Tests\TestHelpers;
use App\Models\Patient;
use App\Models\Activity;
use App\Models\PatientActivity;

test('El EndPoint patient-activities/{codigo} retorna un json válido', function () {
    $user = TestHelpers::rootUser();
    $patient = Patient::factory()->create();
    $activity = Activity::factory()->create();
    PatientActivity::factory()->create([
        'user_id' => $user->id,
        'patient_id' => $patient->id,
        'activity_id' => $activity->id,
    ]);
    $response = $this->get("/api/patient-activities/$patient->codigo");
    $response->assertStatus(200);
    $response->assertJsonStructure([
        'patient' => [
            'nombres',
            'apellidos',
            'nacimiento',
            'sexo',
            'telefono',
        ],
        'activities' => [
            '*' => [
                'activity_id',
                'activity_name',
                'activity_description',
                'activity_thumbnail',
                'description',
                'reasons',
                'goals',
                'indicators',
            ],
        ],
    ]);
});
