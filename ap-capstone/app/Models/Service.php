<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $primaryKey = 'ServiceId';
    public $incrementing = true;

    protected $fillable = ['FacilityId', 'Name', 'Description', 'Category', 'SkillType'];

    public function facility()
    {
        return $this->belongsTo(Facility::class, 'FacilityId', 'FacilityId');
    }
};

