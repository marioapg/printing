<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobStatus extends Model
{
    protected $table = 'job_status';

    protected $fillable = [
        'name',
        'color'
    ];

    CONST COLORS = [
        'purple' => 'primary',
        'gray' => 'secondary',
        'green' => 'success',
        'red' => 'danger',
        'orange' => 'warning',
        'blue' => 'info',
        'light' => 'light',
        'black' => 'dark'

    ];

    public function jobStatusColor(String $color) : String
    {
        return self::COLORS[$color];
    }
}
