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
      'content',
      'course_id',
    ];
    public function unit(){
        return $this->hasOne('App\models\Unit');
    }
}
