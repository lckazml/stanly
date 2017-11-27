<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr=[];
        for($i=0;$i<30;$i++){
            $tmp=[];
            $tmp['title']=str_random(20);
        $tmp['content']='<p><img src="/ueditor/php/upload/image/20170908/1504850030915734.png" title="1504850030915734.png" alt="phpstrom快捷键.png"/></p><p><img src="/ueditor/php/upload/image/20170908/1504850046865993.jpg" title="1504850046865993.jpg" alt="timg.jpg"/></p>';
            $tmp['user_id']=1;
            $tmp['cate_id']=8;
            $tmp['img']='/Uploads/art/BeZnUJZDAuMtmxm7z0ddpboF4O7eB8llpmRsIXRy.jpeg';

            $tmp['created_at']=date('Y-m-d');
            $tmp['updated_at']=date('Y-m-d');
            $arr[]=$tmp;
        }
        DB::table('posts')->insert($arr);
    }
}
