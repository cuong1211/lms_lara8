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
    ];
    public function unit()
    {
        return $this->hasOne('App\models\Unit');
    }
}
