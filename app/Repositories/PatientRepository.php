<?php

namespace App\Repositories;

use App\Models\Patient;

class PatientRepository
{

    public function findByExternalPatientId($id)
    {
        return Patient::where('external_patient_id', $id)->first();
    }
}
