<?php

namespace Database\Seeders;

use App\Models\ParentU;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChildUSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = ParentU::all()->random();
        $user_name = $user->name;
        $user_id =ParentU::all()->where('name',$user_name);
        dd($user_id);
        $u = DB::table('child_u_s')->where('parent_id','=',null)
            ->update(['parent_id'=>$user_id]);

    }
}
