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
                'comment' => 'Oh my god, I really hope I can go on vacation this year :(',
                'post_id' => 1,
                'user_id' => 1,
            ],
            [
                'comment' => 'Don\'t worry, things are looking better so you should be fine !',
                'post_id' => 1,
                'user_id' => 2,
            ],
            [
                'comment' => 'I just created mine and it\'s so much more comfortable, thank you for sharing this ! :)',
                'post_id' => 2,
                'user_id' => 3,
            ],
            [
                'comment' => 'Same I tried it as well and it\'s wonderful !',
                'post_id' => 2,
                'user_id' => 4,
            ],
            [
                'comment' => 'I totally encourage remote-working as well, you lose less time and traffic and therefore have more personal time !',
                'post_id' => 3,
                'user_id' => 4,
            ],
            [
                'comment' => 'I don\'t like working from home, I want to see my collegues to communicate/share/work together :(',
                'post_id' => 3,
                'user_id' => 3,
            ],
            [
                'comment' => 'It\'s hard doing sports with masks on, but not anymore thanks to your advices, thank you very much for sharing this !',
                'post_id' => 4,
                'user_id' => 2,
            ],
            [
                'comment' => 'You should try an FFPC-3 mask, it\'s better for sports !',
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
