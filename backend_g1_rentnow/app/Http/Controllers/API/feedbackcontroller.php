<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ListCommentResource;
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
    public function getcomment(Request $request, $id){
        $Feedback = Feedback::list($id);
        return response()->json([
            'success' => true,
            'message' => 'here are the Comments',
            'data' => ListCommentResource::collection($Feedback),
            'history_count' =>$Feedback->count()
        ], 200);
       }
}
