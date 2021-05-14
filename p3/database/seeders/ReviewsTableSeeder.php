<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use Faker\Factory;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->addRandomReviewData();
    }

    private function addRandomReviewData()
    {
        $faker = Factory::create();
        
        for ($i = 0; $i < 10; $i++) {
            $review = new Review();

            $peopleNames = $faker->firstName . ' ' . $faker->lastName;

            $review->name = $peopleNames;
            $review->review = $faker->paragraph($nbSentences = 3, $variableNbSentences = true);
            $review->rating = $faker->numberBetween($min = 0, $max = 10);
            $review->recommendation = $faker->boolean($chanceOfGettingTrue = 50);
            $review->user_id = 1;
            $review->drama_id = 1;

            

            $review->save();
        }
    }
}
