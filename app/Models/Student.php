<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'birth_date',
        'level',
        'goals',
        'active'
    ];

    protected $casts = [
        'birth_date' => 'date',
        'active' => 'boolean'
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class)
                    ->withPivot('enrollment_date', 'status', 'grade', 'notes')
                    ->withTimestamps();
    }

    public function getLevelFormattedAttribute()
    {
        $levels = [
            'beginner' => 'Iniciante',
            'elementary' => 'Básico',
            'pre_intermediate' => 'Pré-Intermediário',
            'intermediate' => 'Intermediário',
            'upper_intermediate' => 'Intermediário Superior',
            'advanced' => 'Avançado'
        ];

        return $levels[$this->level] ?? $this->level;
    }

    public function getAgeAttribute()
    {
        return $this->birth_date ? $this->birth_date->age : null;
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
