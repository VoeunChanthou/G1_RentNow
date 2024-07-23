<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

use App\Models\Mailsetting;


class MailSettingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:Comment access|Comment show', ['only' => ['index']]);
        $this->middleware('role_or_permission:Comment show', ['only' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $comments = Comment::all();
    return view('setting.comment.index', compact('comments'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function show($id)
     {
         $this->authorize('show', Comment::class);
         $comment = Comment::findOrFail($id);
         return view('admin.comments.show', compact('comment'));
     }
 

}
