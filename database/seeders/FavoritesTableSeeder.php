<?php

use App\Question;
use App\User;
use Illuminate\Database\Seeder;

class FavoritesTableSeeder extends Seeder
{
    public function run()
    {
        // explicit delete so no duplicate when see
        \DB::table('favorites')->delete();

        $users = User::pluck('id')->all();

        $numberOfUsers = count($users);

        foreach (Question::all() as $question) {
            for ($i = 0; $i < rand(0, $numberOfUsers); $i++) {
                $user = $users[$i];
                $question->favorites()->attach($user);
            }
        }
    }
}
