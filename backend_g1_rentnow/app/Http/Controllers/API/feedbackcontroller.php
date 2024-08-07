<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Http\Resources\ListCommentResource;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Products;
use App\Http\Resources\ProductResource;

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


    public function getcommentbyshop(Request $request){
        $shopId = Shop::where('user_id', $request->user()->id)->first();
        $products = Products::where('shop_id', $shopId->id)->get();
        return ProductResource::collection($products);
    }

       public function deleteComment (Request $request, $id){
        Feedback::destroy($id);
        return response()->json([
            'success' => true,
            'message' => 'Feedback deleted successfully',
        ], 200);
       }
       public function updateComment(Request $request, $id){
        $comment = Feedback::find($id);
        $comment->comment = $request->comment;
        $comment->save();
        return response()->json([
            'success' => true,
            'message' => 'Feedback updated successfully',
        ], 200);
       }
       public function show(Request $request, $id){
        $feedback = Feedback::find($id);
        return response()->json([
            'success' => true,
            'data' => $feedback
        ], 200);
       }

}
