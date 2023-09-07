<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $user = User::findOrFail($id);
        $patient_id = $user->patient->id;

        $appointments = Appointment::where('patient_id', $patient_id)
            ->whereNull('deleted_at')
            ->get();

        if ($appointments->isEmpty()) {
            return response()->json([
                'message' => 'No Appointments Available'
            ], 201);
        }

        return response()->json([
            'message' => 'Appointments Fetched Successfully',
            'appointments' => $appointments,
        ], 201);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_id' => ['exists:patients,id'],
            'hospital_id' => ['exists:hospitals,id'],
            'details' => ['required', 'string'],
            'date' => ['required', 'date'],
        'time' => ['required', 'date_format:H:i'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $appointment = new Appointment;
        $appointment->patient_id = $request->patient_id;
        $appointment->hospital_id = $request->hospital_id;
        $appointment->details = $request->details;
        // Convert and store the date
        $appointment->date = Carbon::createFromFormat('Y-m-d', $request->date)->toDateString();

        // Convert and store the time
        $appointment->time = Carbon::createFromFormat('H:i', $request->time)->toTimeString();

        $appointment->save();

        return response()->json([
            'message' => "Appointment Created Successfully",
            'appointment' => $appointment
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function softDeleteAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);

        $appointment->delete();

        return response()->json([
            'message' => "Appointment soft-deleted successfully",
            'appointment' => $appointment
        ]);
    }
}
