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

   public function createBorrow(Request $request){
    $userId = $request->user()->id;
    $borrow = Borrow::create([
      'user_id' => $userId,
      'product_id'=>$request->product_id,
      'borrow_date' => $request->borrow_date,
      'return_date' => $request->return_date,
      'price'=>$request->price,
      'quantity'=>$request->quantity,
      'borrow_status'=>$request->borrow_status
    ]);

    return response()->json([
       'success' => true,
       'message' => 'Borrow created successfully',
        'data' => $borrow
    ]);

  

      
      }

}
