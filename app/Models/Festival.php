<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    protected $fillable = [
        'state_id',
        'pic_id',
        'name',
        'description'
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function picture()
    {
        return $this->belongsTo(Picture::class, 'pic_id');
    }
}