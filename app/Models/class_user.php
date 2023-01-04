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
    return $this->hasMany('App\Models\point', 'user_id', 'id');
  }
  public function classes()
  {
    return $this->belongsTo(Classes::class, 'class_id', 'id');
  }
  public function user()
  {
    return $this->belongsTo('App\Models\user', 'user_id', 'id');
  }
  public function homework_class()
  {
    return $this->hasMany('App\Models\Homework_class', 'class_id', 'class_id');
  }
  // public static function boot()
  // {
  //   parent::boot();

  //   static::deleting(function ($class_user) { // before delete() method call this
  //     $class_user->point()->delete();
  //     // do the rest of the cleanup...
  //   });
  // }
}
