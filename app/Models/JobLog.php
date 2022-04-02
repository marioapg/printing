<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class JobLog extends Model
{
    protected $table = 'job_logs';

    protected $fillable = [
        'job_id',
        'type',
        'change',
        'comment',
    ];

    const COLORS = [
        'primary',
        'secondary',
        'success',
        'danger',
        'warning',
        'info',
        'light',
        'dark'
    ];

    public function randomBootstrapColor(): String
    {
        return self::COLORS[rand(0,7)];
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::create($this->attributes['created_at'])->format('d-m-Y H:i');
    }
}
