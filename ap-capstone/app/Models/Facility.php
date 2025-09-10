<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    const FACILITY_TYPES = ['Lab', 'Workshop', 'Testing Center'];

    protected $fillable = [
        'name', 'location', 'description', 'partner_organization', 'facility_type', 'capabilities',
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function equipment()
    {
        return $this->hasMany(Equipment::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}