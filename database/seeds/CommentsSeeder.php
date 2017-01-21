<?php

use Illuminate\Database\Seeder;
use App\Models\Comments;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->truncate();
        $level = range(1,5);
        // 这里无视 批量复制前提
        $i = 1;
        while($i<=10){
            Comments::create([
                'body'=>'comment' .$i,
                'article_id' => 3,
                'star_level'=>  $level[array_rand($level)]
            ]);
            $i++;
        }
    }
}
