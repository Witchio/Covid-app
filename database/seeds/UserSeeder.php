<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seeder array
        $users = array(
            [
                'name' => 'Jane One',
                'email' => '1111@pass.word',
                'password_hashed' => '$2y$10$vHyCg5Yts3.3gVhBYHmvJucylLwBMJhPx/trmHASf3VVhpqf7TPFq',
                'role' => 'user',
            ],
            [
                'name' => 'Mark Two',
                'email' => '2222@pass.word',
                'password_hashed' => '$2y$10$vHyCg5Yts3.3gVhBYHmvJucylLwBMJhPx/trmHASf3VVhpqf7TPFq',
                'role' => 'user',
            ],
            [
                'name' => 'Tom Three',
                'email' => '3333@pass.word',
                'password_hashed' => '$2y$10$vHyCg5Yts3.3gVhBYHmvJucylLwBMJhPx/trmHASf3VVhpqf7TPFq',
                'role' => 'user',
            ],
            [
                'name' => 'Fran Four',
                'email' => '4444@pass.word',
                'password_hashed' => '$2y$10$vHyCg5Yts3.3gVhBYHmvJucylLwBMJhPx/trmHASf3VVhpqf7TPFq',
                'role' => 'user',
            ],
            [   // keeping to test
                'name' => 'jomama',
                'email' => '0000@pass.word',
                'password_hashed' => '$2y$10$vHyCg5Yts3.3gVhBYHmvJucylLwBMJhPx/trmHASf3VVhpqf7TPFq',
                'role' => 'admin',
            ],

            [
                'name' => 'MITCHIO',
                'email' => 'webermitchio@hotmail.com',
                'password_hashed' => '$2y$10$vHyCg5Yts3.3gVhBYHmvJucylLwBMJhPx/trmHASf3VVhpqf7TPFq',
                'role' => 'admin',
            ],
            [
                'name' => 'luchi',
                'email' => 'luchi@luchi.com',
                'password_hashed' => '$2y$10$zQ3p2LzBqDFHyk4NbgiLHuf3xv3c57Qp38wygDF/uRf5pb2RhiNCO',
                'role' => 'admin',
            ],
            [
                'name' => 'Eduardo',
                'email' => 'pintoedu@gmail.com',
                'password_hashed' => '$2y$10$vHyCg5Yts3.3gVhBYHmvJucylLwBMJhPx/trmHASf3VVhpqf7TPFq',
                'role' => 'admin',
            ],
        );

        // insert seeds
        foreach ($users as $key => $value) {
            DB::table('users')->insert([
                'name' => $value['name'],
                'email' => $value['email'],
                'password' => $value['password_hashed'],
                'role' => $value['role'],
            ]);
        }
    }
}
