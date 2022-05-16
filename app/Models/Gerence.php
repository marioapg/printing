<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gerence extends Model
{
    protected $fillable = [
        'name'
    ];

    public function subgerence()
    {
        return $this->hasMany(SalesGerence::class);
    }
}
