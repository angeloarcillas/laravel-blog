<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        for ($i=0; $i < 15; $i++) {
            User::factory()->hasQuestions(rand(3,7))->create();
        }

        // $this->call([
        //     UsersQuestionsAnswersTableSeeder::class,
        //     FavoritesTableSeeder::class,
        //     VotablesTableSeeder::class,
        // ]);

    }
}
