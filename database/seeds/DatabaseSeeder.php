<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(CommentsSeeder::class);
        $this->call(VotesSeeder::class);
    }
}
