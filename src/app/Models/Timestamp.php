<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timestamp extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'work_start_time',
        'work_end_time',
        'break_start_time',
        'break_end_time',
    ];

    // Calculate break_duration attribute
    public function getBreakDurationAttribute()
    {
        $breakStart = strtotime($this->break_start_time);
        $breakEnd = strtotime($this->break_end_time);

        return ($breakEnd - $breakStart) / 60; // Convert to minutes
    }

    // Calculate work_hour attribute
    public function getWorkHourAttribute()
    {
        $workStart = strtotime($this->work_start_time);
        $workEnd = strtotime($this->work_end_time);

        return ($workEnd - $workStart) / 60; // Convert to minutes
    }

}
