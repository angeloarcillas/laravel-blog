<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory;
    // use Traits\VotableTrait;

    protected $fillable = ['body', 'user_id'];
    public static function boot()
    {
        // EVENTS
        parent::boot();
        static::deleted(function ($answer) {
            $question = $answer->question;
            if ($question->best_answer_id == $answer->id) {
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

    public function path($append = 'index')
    {
       return route("answers.$append", $this->id);
    }
    public function isBest()
    {
        return $this->id == $this->question->best_answer_id;
    }

    public function getStatusAttribute()
    {
        return $this->isBest() ? 'border-teal-400' : 'border-transparent';
    }
}
