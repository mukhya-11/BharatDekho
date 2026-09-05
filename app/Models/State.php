<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['name', 'slug'];

    public function festivals()
    {
        return $this->hasMany(Festival::class);
    }

    public function culture()
    {
        return $this->hasMany(Culture::class);
    }

    public function history()
    {
        return $this->hasMany(History::class);
    }

    public function heritage()
    {
        return $this->hasMany(Heritage::class);
    }
}