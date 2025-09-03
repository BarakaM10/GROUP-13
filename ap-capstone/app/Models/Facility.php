<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $primaryKey = 'FacilityId';
    public $incrementing = true;

    protected $fillable = ['Name', 'Location', 'Description', 'PartnerOrganization', 'FacilityType', 'Capabilities'];

    public function services()
    {
        return $this->hasMany(Service::class, 'FacilityId', 'FacilityId');
    }

    public function equipment()
    {
        return $this->hasMany(Equipment::class, 'FacilityId', 'FacilityId');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'FacilityId', 'FacilityId');
    }
}
