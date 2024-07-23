<?php

namespace App\Http\Controllers;

use App\Models\message;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Resources\MessageResource;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $shopList = [];
        foreach ($users as $user) {
            $roles = $user->getRoleNames();
            if($roles[0] ==  'shop owner'){
                array_push($shopList, $user);
            }
        }
        return $shopList;
        
    }
    public function getUser()
    {
        $users = User::all();
        $shopList = [];
        foreach ($users as $user) {
            $roles = $user->getRoleNames();
            if($roles[0] ==  'user'){
                array_push($shopList, $user);
            }
        }
        return $shopList; 
        
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $userId = $request->user()->id;
        $message = new message();
        $message->user_id = $userId;
        $message->shop_id = $request->shop_id;
        $message->text = $request->text;
        $message->save();

        return response()->json(['message' => 'Message sent successfully'], 200);

    }

   

    /**
     * Display the specified resource.
     */
    public function show(Request $request, String $id)
    {
        $userId = $request->user()->id;
        $messages = message::where('user_id', $userId)->where('shop_id', $id)->get();
        $othermessages = message::where('user_id', $id)->Where('shop_id', $userId)->get();
        return response()->json([
            'messages'=>$messages,
            'othermessages'=>$othermessages
        ]);
    }


    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(message $message)
    {
        //
    }

    public function allMissage(Request $request, String $id){
        $userId = $request->user()->id;
        $messages = message::where('user_id', $userId)->where('shop_id', $id)->orWhere('shop_id', $userId)->where('user_id', $id)->get();
        return MessageResource::collection($messages);
    }
}
