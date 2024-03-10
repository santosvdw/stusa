<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticeExam extends Model
{
    use HasFactory;

    protected $fillable = [
        'vak_id', 'beschrijving', 'titel', 'user_id', 'jaarlaag', 'school_id', 'niveau', 'examenstof', 'opgaven', 'bijlage', 'antwoorden', 'normering', 'lesstof'
    ];

    public function scopeFilter($query, $filters)
    {
        if ($filters['course'] ?? false) {
            $query
                ->where('vak_id', 'like', '%' . $filters['course'] . '%');
        }
        if ($filters['search'] ?? false) {
            $query
                ->Where('titel', 'like', '%' . $filters['search'] . '%');
            // ->orWhere('onderwerp', 'like', '%' . $filters['search'] . '%');
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }
}
