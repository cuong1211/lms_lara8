<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class point extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'class_id',
        'point_1',
        'point_2',
        'point_3',
   ];
   public function class()
      {
        return $this->belongsTo('App\Models\Classes','class_id');
      }
      public function user()
      {
        return $this->belongsTo('App\Models\User','user_id');
      }
}
