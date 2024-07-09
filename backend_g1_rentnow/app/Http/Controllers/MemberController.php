<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Spatie\Permission\Models\role;
use App\Models\Shop;
use App\Http\Resources\MemberResource;
use App\Http\Resources\ShopResource;
use App\Models\User;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userId = $request->user()->id;
        $shopId = Shop::where('user_id', $userId)->first();
        return ShopResource::make($shopId);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = $request->user();
        $permissions = $user->getAllPermissions();
        $roles = $user->getRoleNames();

        $shopId = Shop::where('user_id', $user->id)->first()->id;

        if ($user->roles[0]->name === 'shop owner') {
            if($shopId){
                $member = new Member();
            $member->user_id = $request->user_id;
            $member->shop_id = $shopId;

            

            $member->save();

            return response()->json(
                [
                   'message' => 'Member created successfully',
                   'member' => $member
                ]
                );
            }

            return response()->json(
                [
                   'message' => 'You are not a shop owner',
                ], 403
            );
            
        }

        return response()->json(
            [
               'message' => 'You are not a shop owner',
            ], 403
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        return MemberResource::make(Member::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function listUser()
    {
        $listUser = [];
        $users = User::all();
        foreach ($users as $user){
            $permissions = $user->getAllPermissions();
            $roles = $user->getRoleNames();
            if($user->roles[0]->name == 'user'){
                array_push($listUser, $user);
            }
        }
        return $listUser;
    }
    public function detailUser(String $id)
    {
        $user = User::find($id);
        $permissions = $user->getAllPermissions();
        $roles = $user->getRoleNames();
            
        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $member = Member::where('id', $id)->first();
        $member->delete();

        return response()->json(
            [
               'message' => 'Member deleted successfully',
            ]
        );
    }
}
