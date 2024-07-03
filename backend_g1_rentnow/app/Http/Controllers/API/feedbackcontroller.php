<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class feedbackcontroller extends Controller
{
    //
    public function create(Request $request){
        $feedback = Feedback::createOrupdate($request);
        return response()->json([
            'success' => true,
            'message' => 'Feedback submitted successfully',
            'date' => $feedback
        ]);
    }
}
