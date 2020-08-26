<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seeder array
        $reports = array(
            [
                'post_id' => '1',
                'user_id' => '1',
            ],
            [
                'post_id' => '2',
                'user_id' => '1',
            ],
            [
                'post_id' => '2',
                'user_id' => '3',
            ],
            [
                'post_id' => '3',
                'user_id' => '1',
            ],
            [
                'post_id' => '3',
                'user_id' => '2',
            ],
            [
                'post_id' => '4',
                'user_id' => '5',
            ],
            [
                'post_id' => '4',
                'user_id' => '6',
            ],
            [
                'post_id' => '5',
                'user_id' => '7',
            ],
        );

        // insert seeds
        foreach ($reports as $key => $value) {
            DB::table('reports')->insert([
                'post_id' => $value['post_id'],
                'user_id' => $value['user_id'],
            ]);
        }
    }
}
