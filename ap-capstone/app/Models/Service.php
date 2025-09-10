<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    const CATEGORIES = ['Machining', 'Testing', 'Training'];
    const SKILL_TYPES = ['Hardware', 'Software', 'Integration'];

    protected $fillable = [
        'facility_id', 'name', 'description', 'category', 'skill_type',
    ];

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }
}