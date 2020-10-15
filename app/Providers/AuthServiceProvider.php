<?php

namespace App\Providers;

use App\Answer;
use App\Question;
use App\Policies\AnswerPolicy;
use App\Policies\QuestionPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Question::class => QuestionPolicy::class,
        Answer::class => AnswerPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        // CUSTOM
        $this->registerPolicies();
        \Gate::define('update-question', function ($user, $question) {
            return $user->id == $question->id;
        });

        \Gate::define('delete-question', function ($user, $question) {
            return $user->id == $question->id;
        });
        //
    }
}
