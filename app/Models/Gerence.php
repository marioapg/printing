<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subgerence;

class Gerence extends Model
{
    protected $fillable = [
        'name'
    ];

    public function subgerence()
    {
        return $this->hasMany(Subgerence::class);
    }
}
