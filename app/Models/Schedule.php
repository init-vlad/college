<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'teacher_id',
        'group_id',
        'day_of_week',
        'start_time',
        'end_time',
        'classroom',
    ];

    protected $casts = [
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
    ];

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    // Скоп для сортировки по дням недели
    public function scopeOrderByDayOfWeek($query)
    {
        return $query->orderByRaw("FIELD(day_of_week, 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота')");
    }
}
