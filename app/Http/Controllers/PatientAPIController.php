<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Repositories\PatientRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PatientAPIController extends Controller
{
    protected $patientRepository;

    public function __construct(PatientRepository $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $patient = $this->patientRepository->findByExternalPatientId($id);

            if (!$patient) {
                return response()->json(['error' => 'Patient Not Found!'], 404);
            }

            return $patient;
        } catch (\Throwable $th) {
            // Log the exception
            Log::error('Patient show Error | ', ['exception' => $th->getMessage()]);
            // Handle the exception
            return response()->json(['error' => 'An error occurred ' . $th->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
