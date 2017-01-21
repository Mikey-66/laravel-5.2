<?php

use Illuminate\Database\Seeder;
use App\Models\Comments;
use App\Models\Votes;

class VotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = Comments::all()->toArray();
        foreach ($comments as $item){
            Votes::create(['comment_id'=>$item['id'], 'zan_num'=>  rand(0, 100), 'cai_num'=>rand(0,100)]);
        }
        
    }
}
