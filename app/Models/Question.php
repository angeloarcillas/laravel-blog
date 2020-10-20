<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
    use HasFactory;
    // use Traits\VotableTrait;

    protected $fillable = ['title', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function answers()
    {
        return $this->hasMany(Answer::class)->orderBy('votes_count', 'DESC');
    }
    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    public function path($append = 'index')
    {
        return route("questions.$append", $this->id);
    }
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value, '-');
    }

    public function getStatusAttribute()
    {
        return $this->best_answer_id
          ? 'border-teal-400 text-teal-500'
          : 'border-transparent';
    }

    public function getVotesCountAttribute()
    {
        return $this->votes->count;
    }

    public function isFavorite()
    {
        return $this->favorites()->where('user_id', auth()->id())->count() > 0;
    }

    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }
}
