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
        'blue' => 'info',
        'red' => 'danger',
        'orange' => 'warning',
        'green' => 'success',
        'purple' => 'primary',
        'gray' => 'secondary'
    ];

    public function jobStatusColor(String $color) : String
    {
        return self::COLORS[$color];
    }
}
