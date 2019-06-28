<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'id'                => 1,
                'name'              => 'Admin',
                'email'             => 'admin@library.com',
                'email_verified_at' => Carbon::now(),
                'password'          => bcrypt('test'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
                'role_id'           => 1
            ],
            [
                'id'                => 2,
                'name'              => 'User',
                'email'             => 'user@library.com',
                'email_verified_at' => Carbon::now(),
                'password'          => bcrypt('test'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
                'role_id'           => 2
            ],
        ]);
    }
}
