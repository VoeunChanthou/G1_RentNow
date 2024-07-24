<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\LishistoryResource;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\BorrowResource;
use App\Models\Shop;
use App\Models\Products;

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
   public function deleteStory(Request $request, $id){
    $history = Borrow::where('user_id', $request->user()->id)->where("id", $id )->first();
    // $history = $history? $history[0]->delete() : false;
    $history->borrow_status = 'false';
    $history->save();
     return response()->json([
       'success' => true,
       'message' => 'Borrow deleted successfully',
     ], 200);
    // return $history->borrow_status;
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

    $product = Products::find($request->product_id);
    $product->status = 'borrowed';
    $product->save();

    return response()->json([
       'success' => true,
       'message' => 'Borrow created successfully',
        'data' => $borrow
    ]);

  

      
      }

      public function show(Request $request, String $id){
        // $history = Borrow::where('user_id', $request->user()->id)->where("product_id", $id )->latest();
        // return BorrowResource::make($history);
        $history = Borrow::where('user_id', $request->user()->id)
                     ->where("product_id", $id)
                     ->latest()
                     ->first();

    return BorrowResource::make($history);
      }


      public function getBorrowbyshop(Request $request){
        $shop = Shop::where('user_id', $request->user()->id)->first();
        $borrows = BorrowResource::collection(Borrow::all());
        $list = [];
        foreach ($borrows as $borrow) {
          if($borrow->product != null){
            if ($borrow->product->shop_id == $shop->id) {
              array_push($list, $borrow);
            }
          }
        }
        return $list;
      }

      public function updateBorrow(Request $request, String $id){
        $borrow = Borrow::where('id', $id)->first();
        $borrow->borrow_status = 'true';
        $borrow->save();

        $product = Products::find($borrow->product_id);
        $product->status = 'can_borrow';
        $product->save();

        return response()->json([
           'success' => true,
           'message' => 'Borrow updated successfully'
        ]);
      }
}
