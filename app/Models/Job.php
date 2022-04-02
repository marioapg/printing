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
        'user_id',
        'create_user_id',
        'files'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $cast = [
        'files' => 'array',
    ];

    const COLORS = [
        'Urgente' => 'danger',
        'Alta' => 'warning',
        'Media' => 'info',
        'Baja' => 'light'

    ];

    public function setFilesAttribute($files)
    {
        $this->attributes['files'] = json_encode($files);
    }

    public function getFilesAttribute()
    {
        return json_decode($this->attributes['files']);
    }

    public function hasFiles()
    {
        return !($this->files == null);
    }

    public function jobPriorityColor(): String
    {
        return self::COLORS[$this->priority];
    }

    public function logs()
    {
        return $this->hasMany(JobLog::class);
    }

    public function orderedLogs()
    {
        return $this->logs()->orderBy('created_at', 'desc')->get();
    }

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

    public function dateInputFormat(String $format)
    {
        return Carbon::create($this->attributes['created_at'])->format($format);
    }
}
