<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParentURequest;
use App\Http\Requests\UpdateParentURequest;
use App\Models\ParentUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\String_;

class ParentUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = ParentUser::all();
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
     * @param  \App\Http\Requests\StoreParentURequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone_number' => 'required|integer|digits_between:12,12',
            'address' => 'required|string',
            'aadhar' => 'required|integer|digits_between:12,12',
            'pancard' => 'required|regex:/^([A-Z]){5}([0-9]){4}([A-Z]){1}?$/',
            'email' => 'required|string|unique:users|email',
            'password' => 'required|string|max:6',
            'gender'=>'required|String',

        ]);

        $newUser = new ParentUser([
            'name' => $request->get('name'),
            'phone_number' => $request->get('phone_number'),
            'address'=>$request->get('address'),
            'aadhar'=>$request->get('aadhar'),
            'pancard'=>$request->get('pancard'),
            'email'=>$request->get('email'),
            'password'=>$request->get('password'),
            'gender'=>$request->get('gender'),
        ]);

        $newUser->save();

        return response()->json($newUser);
    }

    /**
     * Display the specified resource.
     *
     * @param $parentUser
     * @return \Illuminate\Http\Response
     */
    public function show($parentUser)
    {
        $user = ParentUser::findOrFail($parentUser);
        return response()->json($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ParentUser  $parentU
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param ParentUser $parentUser
     * @return \Illuminate\Http\Response
     */
    public function edit(ParentUser $parentUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateParentURequest  $request
     * @param  \App\Models\ParentUser  $parentUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParentURequest $request, ParentUser $parentUser)
    {
        $user = ParentUser::findOrFail($parentUser);

        $request->validate([
            'name' => 'required|string',
            'phone_number' => 'required|integer|digits_between:12,12',
            'address' => 'required|string',
            'aadhar' => 'required|integer|digits_between:12,12',
            'pancard' =>'required|regex:/^([A-Z]){5}([0-9]){4}([A-Z]){1}?$/',
            'email' => 'required|string|unique:users|email',
            'password' => 'required|string|max:6',
            'gender'=>'required|String',

        ]);


        $user->name = $request->get('name');
        $user->phone_number= $request->get('phone_number');
        $user->address = $request->get('address');
        $user->aadhar= $request->get('aadher');
        $user->pancard= $request->get('pancard');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->gender = $request->get('gender');
        $user->save();

        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ParentUser  $parentUser
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(ParentUser $parentUser)
    {
        $user = ParentUser::findOrFail($parentUser);
        $user->delete();

        return response()->json($user::all());
    }
    public function showlimit($pan){

        $limit = DB::table('cards')->select('limit')
            ->where('parent_id','=',$pan)->first();

        return response()->json($limit);
    }
    public function showbalance($user){

        $balance = DB::table('transactions')->select('limit_balance')
            ->where('card_number','=',$user)->first();

        return response()->json($balance);
    }

}
