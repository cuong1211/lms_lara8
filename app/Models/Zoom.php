<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zoom extends Model
{
    use HasFactory;
    protected $table = 'zoom';

    protected $fillable = [
        'topic',
        'type',
        'join_url',
        'start_time'

    ];
    public function user()
    {
        return $this->hasOne(User::class,'zoom_id');
    }
}
