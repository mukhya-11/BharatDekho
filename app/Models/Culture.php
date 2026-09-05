<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Culture extends Model
{
    protected $table = 'culture';

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