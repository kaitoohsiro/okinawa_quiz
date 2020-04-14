<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'kaito',
            'email' => 'kaito@admin.com',
            'password' => Hash::make('testtest'),
        ];

        $query = new User();
        $query->insert($param);
    }
}
