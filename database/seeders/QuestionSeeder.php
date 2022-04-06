<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_id');
        foreach (range(1,12) as $index => $item) {
            Question::create([
                'priority' =>$index + 1,
                'body' =>$faker->text($maxNoChars = 150),
                'answer' => json_encode($faker->sentences($nb=4, $asText = false)),
                'correct' =>$faker->numberBetween(0,3)
            ]);
        }
    }
}
