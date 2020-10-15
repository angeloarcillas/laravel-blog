<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Question;
use App\Answer;
class UsersQuestionsAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            // alphabetical order
        \DB::table('answers')->delete();
        \DB::table('users')->delete();
        \DB::table('questions')->delete();

        factory(User::class,5)->create()->each(function($u){
        $u->questions()->saveMany(
          factory(Question::class,rand(1,5))->make()
          )
             ->each(function($q){
               $q->answers()->saveMany(factory(Answer::class,rand(1,10))->make());
          });
      });
    }
}
