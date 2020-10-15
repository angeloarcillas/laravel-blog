<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use Traits\VotableTrait;

    protected $fillable = ['body', 'user_id'];
    public static function boot()
    {
        // EVENTS
        parent::boot();
        //increase answers count on question
        static::created(function ($answer) {
            $answer->question->increment('answers_count');
        });
        static::deleted(function ($answer) {
            // $question = $answer->question;
            $answer->question->decrement('answers_count');
            //set best answer to when if user deleted answer
            if ($question->best_answer_id == $answer->id) { //-> refer to add foreign best ans table
                $question->best_answer_id = null;
                $question->save();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }
    public function getStatusAttribute()
    {
        return $this->isBest() ? "vote-accepted" : " ";
    }

    public function getIsBestAttribute()
    {
        return $this->isBest();
    }

    public function isBest()
    {
        return $this->id == $this->question->best_answer_id;
    }
}
