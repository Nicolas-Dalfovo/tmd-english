<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'level',
        'duration_weeks',
        'price',
        'max_students',
        'start_date',
        'end_date',
        'schedule',
        'active'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'price' => 'decimal:2',
        'active' => 'boolean'
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class)
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

    public function getPriceFormattedAttribute()
    {
        return 'R$ ' . number_format($this->price, 2, ',', '.');
    }

    public function getAvailableSpotsAttribute()
    {
        return $this->max_students - $this->students()->wherePivot('status', 'enrolled')->count();
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function scopeOngoing($query)
    {
        return $query->where('start_date', '<=', now())
                    ->where('end_date', '>=', now());
    }
}
