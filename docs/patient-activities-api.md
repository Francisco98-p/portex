
```bash
php artisan make:controller PatientActivitiesApiController.php
```

[PatientActivitiesApiController](../src/app/Http/Controllers/PatientActivitiesApiController.php)

### File routes/api.php

```php
Route::get('/patient-activities/{code}',
    PatientActivitiesApiController::class . '@getPatientActivities');
```

[Test](../src/tests/Feature/PatientActivityEndPointsTest.php)