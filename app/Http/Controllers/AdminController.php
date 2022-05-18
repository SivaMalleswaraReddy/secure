<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests\StoreadminRequest;
use App\Http\Requests\UpdateadminRequest;
use App\Models\admin;
use App\Models\Card;
use App\Models\ChildUser;
use App\Models\ParentUser;
use App\Models\refunds;
use App\Models\Transaction;
use App\Models\vendor;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * It shows all the admins in Database
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = admin::all();
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
     * to Add the New Admin details
     * @param \App\Http\Requests\StoreadminRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users|email',
            'password' => 'required|string|max:6',
            'phone_number' => 'required|integer|digits_between:12,12',
            'address' => 'required|string',
            'dob' => 'date',
            'joined_date'=>'date',
        ]);
        $newAdmin = new admin([
            'name' => $request->get('name'),
            'phone_number' => $request->get('phone_number'),
            'address'=>$request->get('address'),
            'email'=>$request->get('email'),
            'password'=>$request->get('password'),
            'dob'=>$request->get('dob'),
            'joined_date'=>$request->get('joined_date'),
        ]);

        $newAdmin->save();

        return response()->json($newAdmin);
    }
    /**
     * to Show Admin Details (all admins)
     * @param \App\Models\admin $admin
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(admin $admin)
    {
       // $admin = admin::where('show','=',$admin)->firstorFail();
        $admin =admin::all();
     //   $admin =admin::findOrFail($admin);
        return response()->json($admin);
    }
    /**
     * to Show Admin Details (individual Admin)
     * @param \App\Models\admin $admin
     * @return \Illuminate\Http\JsonResponse
     */
    public function showadminid(Request $request,$admin)
    {
        $admin = admin::where('id', '=', $admin)->firstOrFail();
        return response()->json($admin);
}
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param \App\Models\admin $admin
//     * @return \Illuminate\Http\Response
//     */
//    public function edit(admin $admin)
//    {
//        //
//    }

    /**
     * To update the Admin Details.
     * @param \App\Http\Requests\UpdateadminRequest $request
     * @param \App\Models\admin $admin
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateData(Request $request,$id)
    {
        $admin = admin::findOrFail($id);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users|email',
            'password' => 'required|string|max:6',
            'phone_number' => 'required|integer|digits_between:12,12',
            'address' => 'required|string',
            'dob' => 'date',
            'joined_date'=>'date',
        ]);
        $admin->name = $request->get('name');
        $admin->email = $request->get('email');
        $admin->password = $request->get('password');
        $admin->phone_number= $request->get('phone_number');
        $admin->address= $request->get('address');
        $admin->dob = $request->get('dob');
        $admin->joined_date = $request->get('joined_date');
        $admin->save();
        return response()->json($admin);


    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param \App\Models\admin $admin
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy(admin $admin)
//    {
//
//    }

    public function showparent($parentUser)
    {
        $user = ParentUser::findOrFail($parentUser);
        return response()->json($user);
    }

    public function showchild($childU)
    {
        $user = ChildUser::findOrFail($childU);
        return response()->json($user);
    }

    public function showtransaction($transaction)
    {
        $user = Transaction::findOrFail($transaction);
       // $user = Card::where('id', '=', $transaction)->firstOrFail();

        return response()->json($user);

    }
    /**
     * to show all card details
     * @param $card
     * @return \Illuminate\Http\Response
     */
    public function showcard($card)
    {
        //$user = Card::findOrFail($card);
        $user = Card::where('card_number', '=', $card)->first();
        $cid=$user->child_id;
        $t = ChildUser::all()->where('id','=',$cid)->first();
        $n = $t->first_name;
        return response()->json(["Child_Name"=>$n,"Card-Details"=>$user]);
    }
    public function showrefund( $refund_id)
    {
        $refunds =refunds::findOrFail($refund_id);
        return response()->json($refunds);
    }
    public function showvendor($vendor)
    {
        $vendors = Vendor::findOrFail($vendor);
        return response()->json($vendors);
    }
    /**
     * Admin can check the ParentUser requests.
     *
     * @param \App\Models\admin $users
     * @return \Illuminate\Support\Collection
     */
    public function requestStatus(){
        $users = DB::table('parent_users')
            ->where('is_approved' , '=' , 'not_approved')
            ->get();

        return $users;
    }
    /**
     * Admin can check ParentUser Details, the details is valid then admin will Approve the ParentUser Request.
     *
     * @param \App\Models\admin $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function approve(\Illuminate\Http\Request $request){
        $r = ParentUser::all()->where('id','=',$request->get('user_id'))->first();
//       return $r;
        $rs =$r->is_approved;
//        return $rs;
//        die();
        if($rs == "not_approved"){
            DB::table('parent_users')->
            where('id','=',$request->get('user_id'))
                ->update(['is_approved'=>"approved"]);

            return response()->json("Request Approved");
        }else{
            return response()->json("User is already Approved");
        }

    }
    /**
     * Admin can check ParentUser Details, the details is invalid then admin will Reject the ParentUser request.
     *
     * @param \App\Models\admin $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reject(\Illuminate\Http\Request $request)
    {
        $r = ParentUser::all()->where('id', '=', $request->get('user_id'))->first();
//        return $r;
        $rs = $r->is_approved;
//        return $rs;
//        die();
        if ($rs == "approved") {
            DB::table('parent_users')->
            where('id', '=', $request->get('user_id'))
                ->update(['is_approved' => "not_approved"]);

            return response()->json("User Temp not approved");
        } else {
            return response()->json("Request pending  ");
        }
    }
    /**
     * Admin can check the ChildUser requests.
     *
     * @param \App\Models\admin $users
     * @return \Illuminate\Support\Collection
     */
    public function childrequestStatus(\Illuminate\Http\Request $request){
        $users = DB::table('child_users')
            ->where('is_approved' , '=' , 'not_approved')
            ->get();

        return $users;
    }

    /**
     * Admin can check ChildUser Details, the details is valid then admin will Approve the ChildUser Request.
     *
     * @param \App\Models\admin $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function childapprove(\Illuminate\Http\Request $request){
        $r = ChildUser::all()->where('id','=',$request->get('child_id'))->first();
        $rs =$r->is_approved;
        if($rs == "not_approved"){
            DB::table('child_users')->
            where('id','=',$request->get('child_id'))
                ->update(['is_approved'=>"approved"]);

            return response()->json("Request Approved");
        }else{
            return response()->json("User is already Approved");
        }

    }
    /**
     * Admin can check ChildUser Details, the details is invalid then admin will Reject the ChildUser Request .
     *
     * @param \App\Models\admin $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function childreject(Request $request){
        $r = ChildUser::all()->where('id','=',$request->get('child_id'))->first();
        $rs =$r->is_approved;
        if($rs == "approved"){
            DB::table('child_users')->
            where('id','=',$request->get('child_id'))
                ->update(['is_approved'=>"not_approved"]);

            return response()->json("User Temp not approved");
        }else{
            return response()->json("Request pending  ");
        }

    }

}
