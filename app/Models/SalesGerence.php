<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesGerence extends Model
{
    protected $table = 'sales_gerences';

    protected $fillable = [
        'gerence_id',
        'name'
    ];

    public function gerence()
    {
        return $this->belongsTo(Gerence::class);
    }

    public function job()
    {
        return $this->belongsToMany(Job::class);
    }
}
