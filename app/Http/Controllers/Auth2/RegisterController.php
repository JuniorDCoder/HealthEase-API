<?php

namespace App\Http\Controllers\Auth2;

use Validator;
use App\Models\User;
use App\Models\Patient;
use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    //

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'phone_number' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->assignRole('patient');

        $mr_number = Patient::GenerateMRNumber();

        while (Patient::where('mr_number', $mr_number)->exists()) {
            $mr_number = Patient::GenerateMRNumber();
        }

        $patient = Patient::create([
            'user_id' => $user->id,
            'phone_number' => $request->phone_number,
            'mr_number' => $mr_number,
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        $data = [
            "user" => $user,
            "mr_number" => $patient->mr_number,
        ];

        $email = new WelcomeEmail("Registered Successfully into ".config('app.name'), "welcome", $data);
        Mail::to($user->email)->send($email);

        return response()->json([
            'success' => true,
            'message' => 'Patient created successfully',
            'patient' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone_number' => $patient->phone_number,
                'mr_number' => $patient->mr_number,
            ],
            'token' => $token,
        ], 201);
    }

}
