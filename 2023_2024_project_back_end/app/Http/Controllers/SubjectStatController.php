<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CbcsSubjectOfferedd;

class SubjectStatController extends Controller
{

    public function updateSubject(Request $request, $id)
    {
        try {
            // Find the subject by ID
            $subject = CbcsSubjectOfferedd::findOrFail($id);

            // Update the assigned attribute
            $subject->assigned = $request->input('assigned');
            $subject->save();

            // Return success response
            return response()->json(['message' => 'Subject assigned status updated successfully'], 200);
        } catch (\Exception $e) {
            // Return error response if an exception occurs
            return response()->json(['error' => 'Failed to update subject assigned status'], 500);
        }
    }
}