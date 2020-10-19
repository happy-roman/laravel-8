<?php

namespace Database\Seeders;


use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('news')->insert($this->getData());
    }
    private function getData() {
        $faker = Factory::create('ru_Ru');
        $data = [];
        for ( $i=0; $i <=20; $i++ ) {
            $data[] = [
                'title' => $faker->title(rand(3,5)),
                'text' => $faker->realText(rand(200,300)),
                'isPrivate' => $faker->boolean,
                'category_id' => $faker->biasedNumberBetween(1,5),
            ];
        }
        return $data;
    }
}
