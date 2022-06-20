<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    use HasFactory;
    protected $table = 'homework';

    protected $fillable = [
      'title',
      'course_id',
      'lesson_id',
      'excel',
    ];
    public function unit(){
        return $this->belongsTo('App\models\Unit');
    }
}
