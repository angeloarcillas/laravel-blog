<?php

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;

class FavoritesTableSeeder extends Seeder
{
    public function run()
    {
        // // explicit delete so no duplicate when see
        // \DB::table('favorites')->delete();

        $users = User::pluck('id')->all();

        $n = count($users);

        foreach (Question::all() as $question) {
            for ($i = 0; $i < rand(0, $n); $i++) {
                $question->favorites()->attach($user[$i]);
            }
        }
    }
}
