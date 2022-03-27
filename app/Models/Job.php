<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Job extends Model
{
    use Softdeletes;

    protected $fillable = [
        'name',
        'description',
        'priority',
        'delivery_date',
        'admin_check',
        'user_check',
        'job_status_id',
        'user_id'
    ];

    public function status()
    {
        return $this->belongsTo(JobStatus::class, 'job_status_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function responsable()
    {
        return $this->user->name;
    }

    public function statusName()
    {
        return $this->status->name;
    }

    public function statusColor()
    {
        return $this->status->jobStatusColor($this->status->color);
    }

    public function getDeliveryDateAttribute()
    {
        return Carbon::create($this->attributes['delivery_date'])->format('d-m-Y');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::create($this->attributes['created_at'])->format('d-m-Y');
    }
}
