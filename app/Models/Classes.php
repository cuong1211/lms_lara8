<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $table = 'class';
    protected $fillable = [
        'name',
        'user_id',
        'course_id',
    ];
    public function course()
    {
        return $this->belongsTo('App\models\Course');
    }
    public function user()
    {
        return $this->belongsTo('App\models\User');
    }
}
