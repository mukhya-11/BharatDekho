<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Heritage extends Model
{
    protected $table = 'heritage';

    protected $fillable = [
        'state_id',
        'name',
        'image_url',
        'description',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}