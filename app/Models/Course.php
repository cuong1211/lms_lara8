<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'course';

    protected $fillable = [
      'name',
      'start_time',
      'img',

    ];
    public function unit()
    {
      return $this->hasMany('App\models\Unit','course_id','id');
    }
}
