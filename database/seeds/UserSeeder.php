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
                'name' => 'Brad',
                'email' => '1111@pass.word',
                'password_hashed' => '$2y$10$vHyCg5Yts3.3gVhBYHmvJucylLwBMJhPx/trmHASf3VVhpqf7TPFq',
                'role' => 'user',
            ],
            [
                'name' => 'Will',
                'email' => '2222@pass.word',
                'password_hashed' => '$2y$10$vHyCg5Yts3.3gVhBYHmvJucylLwBMJhPx/trmHASf3VVhpqf7TPFq',
                'role' => 'user',
            ],
            [
                'name' => 'Marie',
                'email' => '3333@pass.word',
                'password_hashed' => '$2y$10$vHyCg5Yts3.3gVhBYHmvJucylLwBMJhPx/trmHASf3VVhpqf7TPFq',
                'role' => 'user',
            ],
            [
                'name' => 'John',
                'email' => '4444@pass.word',
                'password_hashed' => '$2y$10$vHyCg5Yts3.3gVhBYHmvJucylLwBMJhPx/trmHASf3VVhpqf7TPFq',
                'role' => 'user',
            ],
            [   // keeping to test
                'name' => 'joanna',
                'email' => '0000@pass.word',
                'password_hashed' => '$2y$10$vHyCg5Yts3.3gVhBYHmvJucylLwBMJhPx/trmHASf3VVhpqf7TPFq',
                'role' => 'admin',
            ],

            [
                'name' => 'mitchio',
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
            [
                'name' => 'witchio',
                'email' => 'mitch@gmail.com',
                'password_hashed' => '$2y$10$3CMrFO4Usk3fN88qRkJxdu85HX8NnbXus.4G6pC/tS2oC0dspP0ai',
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
