<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seeder array
        $posts = array(
            [
                'title' => 'Travel tips during the pandemic',
                'content' => 'Lorem Ipsum is FAKE TEXT! An extremely credible
                source has called my office and told me that Lorem Ipsums
                birth certificate is a fraud. Lorem Ipsum is unattractive, both inside and out.',
                'image' => 'title1.jpeg',
                'user_id' => 1,
                /* 'deleted_at' => null, */
                'created_at' => '2020-08-26 07:52:47',
                'deleted_at' => '2020-08-26 07:52:47',
            ],
            [
                'title' => 'Create your own mask for covid-protection !',
                'content' => 'Youre telling the enemy exactly what youre going to do.
                No wonder youve been fighting Lorem Ipsum your entire adult life.',
                'image' => 'title2.jpeg',
                'user_id' => 2,
                'deleted_at' => null,
                'created_at' => '2020-08-23 12:52:27',
            ],
            [
                'title' => 'Remote working, why home office is a better solution even after the pandemic',
                'content' => 'An extremely credible source has called my office
                and told me that Lorem Ipsums birth certificate is a fraud.
                Lorem Ipsum is unattractive, both inside and out.',
                'image' => 'title3.jpeg',
                'user_id' => 3,
                'deleted_at' => null,
                'created_at' => '2020-04-13 02:32:49',
            ],
            [
                'title' => 'Covid-19 gave me the opportunity to spend more time with my family',
                'content' => 'Youve been fighting Lorem Ipsum your entire adult life.',
                'image' => 'title4.jpeg',
                'user_id' => 4,
                'deleted_at' => '2020-08-26 07:52:47',
                'created_at' => '2020-08-22 03:32:12',
            ],
            [
                'title' => 'Corona virus and sports - How to hit the gym whiles respecting social distancing rules',
                'content' => 'Lorem Ipsum is unattractive, both inside and out.',
                'image' => 'title5.jpeg',
                'user_id' => 5,
                'deleted_at' => null,
                'created_at' => '2020-06-26 14:25:47',
            ],
        );

        // insert seeds
        foreach ($posts as $key => $value) {
            DB::table('posts')->insert([
                'title' => $value['title'],
                'content' => $value['content'],
                'image' => $value['image'],
                'user_id' => $value['user_id'],
                'deleted_at' => $value['deleted_at'],
                'created_at' => $value['created_at'],
            ]);
        }
    }
}
