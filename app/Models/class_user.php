<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class class_user extends Model
{
    use HasFactory;
  
    protected $table = 'class_users';
    protected $fillable = [
        'class_id',
        'user_id',
      ];
      public function point()
      {
        return $this->hasMany('App\Models\point','student_id','id');
      }
      
}
