<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'specialty',
        'year',
        'course',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'year' => 'integer',
        'course' => 'integer',
    ];

    public function students(): HasMany
    {
        return $this->hasMany(User::class, 'group_id')->where('role', 'student');
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }
}
