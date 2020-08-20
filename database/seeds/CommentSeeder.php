<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seeder array
        $comments = array(
            [
                'comment' => 'This is some post',
                'post_id' => 1,
                'user_id' => 1,
            ],
            [
                'comment' => 'This is some comment',
                'post_id' => 1,
                'user_id' => 2,
            ],
            [
                'comment' => 'This is some post too',
                'post_id' => 2,
                'user_id' => 3,
            ],
            [
                'comment' => 'This is some comment too',
                'post_id' => 2,
                'user_id' => 4,
            ],
            [
                'comment' => 'This is 3 post',
                'post_id' => 3,
                'user_id' => 4,
            ],
            [
                'comment' => 'This is 3 comment',
                'post_id' => 3,
                'user_id' => 3,
            ],
            [
                'comment' => 'This is post four me',
                'post_id' => 4,
                'user_id' => 2,
            ],
            [
                'comment' => 'This is comment four you',
                'post_id' => 4,
                'user_id' => 1,
            ],
        );

        // insert seeds
        foreach ($comments as $key => $value) {
            DB::table('comments')->insert([
                'comment' => $value['comment'],
                'post_id' => $value['post_id'],
                'user_id' => $value['user_id'],
            ]);
        }
    }
}
