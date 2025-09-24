<?php

namespace App\Http\Controllers;

use App\Models\UserForm;
use Illuminate\Http\Request;

class UserFormController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'grade' => 'required|string|max:255',
        ]);

        // Create a new UserForm record
        $userForm = UserForm::create([
            'name' => $validatedData['name'],
            'phone_number' => $validatedData['phone'],
            'academic_level' => $validatedData['grade'],
        ]);

        // Return a successful JSON response
        return response()->json([
            'message' => 'Your request has been submitted successfully.',
            'data' => $userForm
        ], 201);
    }
}
