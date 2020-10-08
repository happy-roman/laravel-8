<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }
    private function getData() {
        $faker = Factory::create('Ru_ru');
        $data = [];
        for ( $i=0; $i < 5; $i++ ) {
            $data[] = [
                'title' => $faker->word,
                'slug' => $faker->word
            ];
        }
        return $data;
    }
}
