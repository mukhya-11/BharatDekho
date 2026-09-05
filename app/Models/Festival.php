<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    protected $table = 'festivals';

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