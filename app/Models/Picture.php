<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'state_id',
        'pic_name',
        'image_path'
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function festivals()
    {
        return $this->hasMany(Festival::class, 'pic_id');
    }
}