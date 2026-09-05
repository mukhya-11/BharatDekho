<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'history';

    protected $fillable = [
        'state_id',
        'pic_id',
        'name',
        'description',
    ];

    public function picture()
    {
        return $this->belongsTo(Picture::class, 'pic_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}