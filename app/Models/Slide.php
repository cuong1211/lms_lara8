<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;
    protected $table = 'slide';

    protected $fillable = [
        'title',
        'link',
        'course_id',
    ];
    public function unit()
    {
        return $this->hasOne('App\models\Unit');
    }
    public function course()
    {
        return $this->belongsTo('App\models\Course');
    }
}
