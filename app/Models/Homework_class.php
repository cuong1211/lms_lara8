<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework_class extends Model
{
    use HasFactory;
    protected $table = 'homework_class';

    protected $fillable = [
      'user_id',
      'unit_id',
      'class_id',
      'link'
    ];
    public function user(){
        return $this->belongsTo('App\models\User');
    }
    // public function unit(){
    //     return $this->hasOne('App\models\Unit');
    // }
    public function class_user(){
        return $this->hasMany(class_user::class);
    }
}
