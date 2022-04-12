<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subgerence extends Model
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
}
