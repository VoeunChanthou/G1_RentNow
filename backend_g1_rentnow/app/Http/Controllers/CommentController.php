<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comment = Comment::all();
        return response()->json([
            'Comment' => $comment
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createComment(Request $request)
    {
        $comment = Comment::create($request->all());
        return response()->json([
            'comment' => $comment,
           'message' => 'Comment created successfully'
        ]);
        // return $request;

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

}
