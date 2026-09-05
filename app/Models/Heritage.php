<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Heritage extends Model
{
    protected $table = 'heritage';

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