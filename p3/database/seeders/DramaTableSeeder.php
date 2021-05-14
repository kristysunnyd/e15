<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Drama;
use Faker\Factory;

class DramaTableSeeder extends Seeder
{
    public function run()
    {
        $this->addOneDrama();
        $this->addRandomlyGeneratedDramaData();
    }

    private function addOneDrama()
    {
        $faker = Factory::create();

        $drama = new Drama();

        $drama->slug = 'inception';
        $drama->drama_title = 'Inception';
        $drama->genre = 'sci-fi';
        $drama->director = 'Christopher Nolan';
        $drama->main_cast = 'Leonardo Dicaprio, Joseph Gordon-Levitt';
        $drama->image_url = 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fnowplayer.now.com%2Fondemand%2Fdetail%3Fid%3D201101070006219%26type%3Dproduct&psig=AOvVaw0ESGZS7d1pbScBllNwcdbK&ust=1621014888887000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCPjKoJedx_ACFQAAAAAdAAAAABAD';
        $drama->air_date = $faker->date($format = 'Y-m-d', $max = 'now');
        $drama->episode_duration = '162';
        $drama->num_episodes = '30';
        $drama->description = '/www.google.com/url?sa=i&url=https%3A%2F%2Fnowplayer.now.com%2Fondemand%2Fdetail%3Fid%3D201101070006219%26type%3Dproduct&psig=AOvVaw0ESGZS7d1pbScBllNwcdbK&ust=1621014888887000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCPjKoJedx_ACFQAAAAAdAAAAABAD, 1991';
        $drama->production_company = 'Legendary Pictures';
        $drama->external_url = 'https://www.imdb.com/title/tt1375666/
';
        $drama->save();
    }



    private function addRandomlyGeneratedDramaData()
    {
        $faker = Factory::create();
        
        for ($i = 0; $i < 20; $i++) {
            $drama = new Drama();
            
            $dramaTitle = $faker->words(rand(1, 4), true);

            $drama->slug = Str::slug($dramaTitle, '-');
            $drama->drama_title = Str::title($dramaTitle);

            $peopleNames = $faker->firstName . ' ' . $faker->lastName;

            $drama->genre = $faker->colorName;
            $drama->director = $peopleNames;
            $drama->main_cast = $peopleNames.', '.$peopleNames;
            $drama->image_url = $faker->imageUrl($width = 640, $height = 480);
            $drama->air_date = $faker->date($format = 'Y-m-d', $max = 'now');
            $drama->description = $faker->paragraph($nbSentences = 4, $variableNbSentences = true);
            $drama->episode_duration = $faker->numberBetween($min = 5, $max = 120);
            $drama->num_episodes = $faker->numberBetween($min = 1, $max = 150);
            $drama->production_company = $faker->company;
            $drama->external_url = $faker->url;

            $drama->save();
        }
    }
}
