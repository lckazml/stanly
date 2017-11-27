<?php

use Illuminate\Database\Seeder;

class Userseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr=[];
        for($i=0;$i<100;$i++){
            $tmp=[];
            $tmp['username']=str_random(16);
            $tmp['email']=str_random(8).'@qq.com';
            $tmp['password']=Hash::make('iloveU');
            $tmp['profile']='/Uploads/9IbZAEq0RtpVCOtI3mAEYB9qMV7SJDXdBxJXO0on.jpeg';
            $tmp['rememberToken']=str_random(50);
            $tmp['intro']=str_random(100);
            $tmp['created_at']=date('Y-m-d');
            $tmp['updated_at']=date('Y-m-d');
            $arr[]=$tmp;
        }
        DB::table('users')->insert($arr);
    }
}
