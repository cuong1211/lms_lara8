<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $table = 'unit';

    protected $fillable = [
      'title',
      'description',
      'content',
      'course_id',
      'slide_id',
      'homework_id',
      'quizzes_id',
    ];
    public function course()
    {
      return $this->belongsTo('App\models\Course','course_id');
    }
    public function slide(){
        return $this->belongsTo('App\models\Slide');
    }
    public function test(){
        return $this->hasOne('App\models\Test','unit_id');
    }
    public function homework(){
        return $this->belongsTo('App\models\Homework');
    }
    public function quiz(){
        return $this->belongsTo('App\models\Quiz','quizzes_id');
    }
}
