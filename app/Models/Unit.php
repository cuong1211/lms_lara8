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
      'course_id',
      'zoom_id',
      'slide_id',
      'homework_id',
      'quizzes_id',
      'exam_id'
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
        return $this->HasMany('App\models\Homework','unit_id','homework_id');
    }
    public function exam(){
        return $this->HasMany('App\models\Exam','unit_id','exam_id');
    }
    public function quiz(){
        return $this->hasOne(Quiz::class);
    }
}
