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
                'name' => 'One',
                'email' => '1111@pass.word',
                'password_hashed' => 12345678,
                'role' => 'user',
            ],
            [
                'name' => 'Two',
                'email' => '2222@pass.word',
                'password_hashed' => 12345678,
                'role' => 'user',
            ],
            [
                'name' => 'Three',
                'email' => '3333@pass.word',
                'password_hashed' => 12345678,
                'role' => 'user',
            ],
            [
                'name' => 'Four',
                'email' => '4444@pass.word',
                'password_hashed' => 12345678,
                'role' => 'user',
            ],
            [
                'name' => 'jo00',
                'email' => '0000@pass.word',
                'password_hashed' => 12345678,
                'role' => 'admin',
            ],
            [
                'name' => 'MITCHIO',
                'email' => 'MUST BE UNIQUE',
                'password_hashed' => 12345678,
                'role' => 'admin',
            ],
            [
                'name' => 'luchi',
                'email' => 'luchi@luchi.com',
                'password_hashed' => '$2y$10$zQ3p2LzBqDFHyk4NbgiLHuf3xv3c57Qp38wygDF/uRf5pb2RhiNCO',
                'role' => 'admin',
            ],
            /* [
                'name' => 'EDUARDO',
                'email' => 'MUST BE UNIQUE',
                'password_hashed' => 12345678,
                'role' => 'admin',
            ], */
        );

        // insert seeds
        foreach ($users as $key => $value) {
            DB::table('users')->insert([
                'name' => $value['name'],
                'email' => $value['email'],
                'password_hashed' => $value['password_hashed'],
                'role' => $value['role'],
            ]);
        }
    }
}
