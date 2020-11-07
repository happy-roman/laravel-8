<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert($this->getData());
    }
    private function getData() {
        $faker = Factory::create('ru_RU');
        $data[] = [
            'name' => 'admin',
            'email' => 'admin@admin.ru',
            'is_admin' => true,
            'password' => Hash::make(123),
        ];
        for ( $i=0; $i <=3; $i++ ) {
            $data[] = [
                'name' => $faker->name,
                'email' => $faker->email,
                'is_admin' => $faker->boolean,
                'password' => Hash::make(123),
            ];
        }
        return $data;
    }
}
