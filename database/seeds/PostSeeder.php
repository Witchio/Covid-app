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
                'content' => 'All of us agreed that things are getting bad. I didnt mention anything to the washing machine as she puts a different spin on everything. Certainly not to the fridge as he is acting cold and distant. In the end the iron calmed me down as she said everything will be fine, no situation is too pressing. The hoover was very unsympathetic... told me to just suck it up, but the fan was more optimistic and hoped it would all soon blow over!',
                'image' => 'title1.jpeg',
                'user_id' => 1,
                'deleted_at' => null,
                'created_at' => '2020-08-26 07:52:47',
            ],
            [
                'title' => 'How to make your own mask for covid-protection',
                'content' => 'I didnt mention anything to the washing machine as she puts a different spin on everything. Certainly not to the fridge as he is acting cold and distant. In the end the iron calmed me down as she said everything will be fine, no situation is too pressing. The hoover was very unsympathetic... told me to just suck it up, but the fan was more optimistic and hoped it would all soon blow over!The toilet looked a bit flushed when I asked its opinion and didn’t say anything but the door knob told me to get a grip.',
                'image' => 'title2.jpeg',
                'user_id' => 2,
                'deleted_at' => null,
                'created_at' => '2020-08-23 12:52:27',
            ],
            [
                'title' => 'Remote working, why home office is a better solution even after the pandemic',
                'content' => 'All of us agreed that things are getting bad. I didnt mention anything to the washing machine as she puts a different spin on everything. Certainly not to the fridge as he is acting cold and distant. In the end the iron calmed me down as she said everything will be fine, no situation is too pressing. The hoover was very unsympathetic... told me to just suck it up, but the fan was more optimistic and hoped it would all soon blow over!',
                'image' => 'title3.jpeg',
                'user_id' => 3,
                'deleted_at' => null,
                'created_at' => '2020-04-13 02:32:49',
            ],
            [
                'title' => 'Covid-19 gave me the opportunity to spend more time with my family',
                'content' => 'Lorem Ipsum is FAKE TEXT! An extremely credible
                source has called my office and told me that Lorem Ipsums
                birth certificate is a fraud. Lorem Ipsum is unattractive, both inside and out.',
                'image' => 'title4.jpeg',
                'user_id' => 4,
                'deleted_at' => '2020-08-26 07:52:47',
                'created_at' => '2020-08-22 03:32:12',
            ],
            [
                'title' => 'Corona virus and sports - How to hit the gym whiles respecting social distancing rules',
                'content' => 'Just be careful because people are going crazy from being in lock down! Actually Ive just been talking about this with the microwave and toaster, while drinking coffee!  All of us agreed that things are getting bad. I didnt mention anything to the washing machine as she puts a different spin on everything. Certainly not to the fridge as he is acting cold and distant. In the end the iron calmed me down as she said everything will be fine, no situation is too pressing. The hoover was very unsympathetic... told me to just suck it up, but the fan was more optimistic and hoped it would all soon blow over!The toilet looked a bit flushed when I asked its opinion and didn’t say anything but the door knob told me to get a grip.😬 The front door said I was unhinged and so the curtains told me to ........yes, you guessed it 😝.....pull myself together ! Take care, everyone, x',
                'image' => 'title5.jpeg',
                'user_id' => 5,
                'deleted_at' => null,
                'created_at' => '2020-06-26 14:25:47',
            ],
            [
                'title' => 'How I made my own hand sanitizer at home',
                'content' => 'Just be careful because people are going crazy from being in lock down! Actually Ive just been talking about this with the microwave and toaster, while drinking coffee!  All of us agreed that things are getting bad. I didnt mention anything to the washing machine as she puts a different spin on everything. Certainly not to the fridge as he is acting cold and distant. In the end the iron calmed me down as she said everything will be fine, no situation is too pressing. The hoover was very unsympathetic... told me to just suck it up, but the fan was more optimistic and hoped it would all soon blow over!The toilet looked a bit flushed when I asked its opinion and didn’t say anything but the door knob told me to get a grip.😬 The front door said I was unhinged and so the curtains told me to ........yes, you guessed it 😝.....pull myself together ! Take care, everyone, x',
                'image' => 'title6.jpeg',
                'user_id' => 5,
                'deleted_at' => null,
                'created_at' => '2020-07-31 22:25:47',
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
