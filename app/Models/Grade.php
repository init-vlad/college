<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'subject_id',
        'teacher_id',
        'grade',
        'grade_type',
        'comment',
        'date',
    ];

    protected $casts = [
        'date' => 'date',
        'grade' => 'integer',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    // Константы для типов оценок
    public const GRADE_TYPES = [
        'exam' => 'Экзамен',
        'test' => 'Тест',
        'homework' => 'Домашнее задание',
        'attendance' => 'Посещаемость',
    ];

    // Цвета для оценок
    public function getGradeColorAttribute(): string
    {
        return match($this->grade) {
            5 => 'success',
            4 => 'warning',
            3 => 'info',
            2 => 'danger',
            default => 'gray',
        };
    }
}
