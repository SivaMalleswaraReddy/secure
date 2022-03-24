<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChildURequest;
use App\Http\Requests\UpdateChildURequest;
use App\Models\ChildUser;
use App\Models\ParentUser;
use http\Env\Request;

class ChildUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = ChildUser::all();
        return response()->json($comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChildURequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'dob' => 'date',
            'email' => 'required|string|unique:users|email',
            'phone_number' => 'required|integer|digits_between:12,12',
            'gender'=>'required|String',
            'limit'=>'required|integer',
            'parent_id'=>ParentUser::all()->random()->pluck('id')

        ]);

        $newUser = new ChildUser([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'dob'=>$request->get('dob'),
            'email'=>$request->get('email'),
            'phone_number' => $request->get('phone_number'),
            'gender'=>$request->get('gender'),
            'limit'=>$request->get('limit'),
            'parent_id'=>$request->get('parent_id')
        ]);

        $newUser->save();

        return response()->json($newUser);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChildUser  $childU
     * @return \Illuminate\Http\Response
     */
    public function show(ChildUser $childU)
    {
        $user = ChildUser::findOrFail($childU);
        return response()->json($user);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChildUser  $childU
     * @return \Illuminate\Http\Response
     */
    public function edit(ChildUser $childU)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChildURequest  $request
     * @param  \App\Models\ChildUser  $childU
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChildURequest $request, ChildUser $childU)
    {
        $user = ChildUser::findOrFail($childU);

        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'dob' => 'date',
            'email' => 'required|string|unique:users|email',
            'phone_number' => 'required|integer|digits_between:12,12',
            'gender'=>'required|String',
            'limit'=>'required|integer',
            'parent_id'=>'required|integer'
        ]);


        $user->first_name = $request->get('name');
        $user->last_name = $request->get('name');
        $user->dob = $request->get('dob');
        $user->email = $request->get('email');
        $user->phone_number= $request->get('phone_number');
        $user->gender = $request->get('gender');
        $user->limit = $request->get('limit');
        $user->parent_id=$request->get('parent_id');
        $user->save();

        return response()->json($user);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChildUser  $childU
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChildUser $childU)
    {
        $user = ChildUser::findOrFail($childU);
        $user->delete();

        return response()->json($user::all());
    }
    public function showlimit($pan){

        $limit = DB::table('cards')->select('limit')
            ->where('child_id','=',$pan)->first();

        return response()->json($limit);
    }
    public function showbalance($user){

        $balance = DB::table('transactions')->select('limit_balance')
            ->where('card_number','=',$user)->first();

        return response()->json($balance);
    }

}