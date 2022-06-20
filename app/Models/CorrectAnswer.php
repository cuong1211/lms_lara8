<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorrectAnswer extends Model
{
    use HasFactory;
    protected $fillable = ['question_id', 'answer_id'];
    public function questions()
    {
        return $this->hasOne(Question::class);
    }

    public function answers()
    {
        return $this->hasOne(Answer::class);
    }
}
