<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\LishistoryResource;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class borrowcontrpller extends Controller
{
    //
   public function gethistory(Request $request){
    $User_id = $request->user()->id;
    $historyUser = Borrow::list($User_id);
    return response()->json([
        'success' => true,
        'message' => 'here are the history',
        'data' =>  LishistoryResource::collection($historyUser),
        'history_count' =>$historyUser->count()
    ], 200);
   }
   public function delete (Request $request, $id){
    $history = Borrow::where('user_id', $request->user()->id)->where("id", $id )->get();
    $history = $history? $history[0]->delete() : false;
     return response()->json([
       'success' => true,
       'message' => 'Borrow deleted successfully',
     ], 200);
   }

}
