<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChildURequest;
use App\Http\Requests\UpdateChildURequest;
use App\Models\ChildUser;
use App\Models\ParentUser;
use App\Models\Transaction;
use http\Env\Request;
use Illuminate\Support\Facades\DB;

class ChildUserController extends Controller
{
    /**
     * Display a listing of All ChildUser Details.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $comments = ChildUser::all();
        return response()->json($comments);
    }

//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        //
//    }

    /**
     * ParentUser can Store a newly ChildUser Register .
     *
     * @param  \App\Http\Requests\StoreChildURequest  $request
     * @return \Illuminate\Http\JsonResponse
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
            'monthly_limit'=>'required|integer',

        ]);
        $newUser = new ChildUser([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'dob'=>$request->get('dob'),
            'email'=>$request->get('email'),
            'phone_number' => $request->get('phone_number'),
            'gender'=>$request->get('gender'),
            'monthly_limit'=>$request->get('monthly_limit'),
            'is_approved'=>'not-approved',
            'parent_id'=>ParentUser::all()->pluck('id')->random()
        ]);
        $newUser->save();

        return response()->json($newUser);
    }

    /**
     * ChildUser can check is Details  .
     *
     * @param  \App\Models\ChildUser  $childU
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ChildUser $childU)
    {
        $user = ChildUser::findOrFail($childU);
        return response()->json($user);
    }
    /**
     * ChildUser can check is Transactions.
     *
     * @param  \App\Models\ChildUser  $transaction
     * @return \Illuminate\Http\JsonResponse
     */
   public function showTransaction(transaction $transaction)
    {
        $comments = Transaction::all();
        return response()->json($comments);
    }




//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  \App\Models\ChildUser  $childU
//     * @return \Illuminate\Http\Response
//     */
//    public function edit(ChildUser $childU)
//    {
//        //
//    }

    /**
     * Update the specified ChildUser Details in storage.
     *
     * @param  \App\Http\Requests\UpdateChildURequest  $request
     * @param  \App\Models\ChildUser  $childU
     * @return \Illuminate\Http\JsonResponse
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
            'monthly_limit'=>'required|integer',
            'parent_id'=>'required|integer'
        ]);


        $user->first_name = $request->get('name');
        $user->last_name = $request->get('name');
        $user->dob = $request->get('dob');
        $user->email = $request->get('email');
        $user->phone_number= $request->get('phone_number');
        $user->gender = $request->get('gender');
        $user->monthly_limit = $request->get('monthly_limit');
        //$user->parent_id=$request->get('parent_id');
        $user->save();

        return response()->json($user);
    }
    /**
     * Remove the specified ChildUser from storage.
     *
     * @param  \App\Models\ChildUser  $childU
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(ChildUser $childU)
    {
        $user = ChildUser::findOrFail($childU);
        $user->delete();

        return response()->json($user::all());
    }
    /**
     * Admin can check the ChildUser requests.
     *
     * @param \App\Models\admin $users
     * @return \Illuminate\Http\JsonResponse
     */
    public function childrequestStatus(){
        $users = DB::table('child_users')->select('*')
            ->where('is_approved' , '=' , 'not_approved')->get();


        return  response()->json($users);
    }

}
