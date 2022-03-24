<?php

namespace Database\Seeders;

use App\Models\ParentUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChildUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = ParentUser::all()->random();
        $user_name = $user->name;
        $user_id =ParentUser::all()->where('name',$user_name);
        dd($user_id);
        $u = DB::table('child_users')->where('parent_id','=',null)
            ->update(['parent_id'=>$user_id]);

    }
}
