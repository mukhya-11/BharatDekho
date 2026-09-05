<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Culture extends Model
{
    protected $table = 'culture';

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