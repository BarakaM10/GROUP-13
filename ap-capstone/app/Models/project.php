<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $primaryKey = 'ProjectId';
    public $incrementing = true;

    protected $fillable = [
        'ProgramId', 'FacilityId', 'Title', 'NatureOfProject', 'Description',
        'InnovationFocus', 'PrototypeStage', 'TestingRequirements', 'CommercializationPlan'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class, 'ProgramId', 'ProgramId');
    }

    public function facility()
    {
        return $this->belongsTo(Facility::class, 'FacilityId', 'FacilityId');
    }

    public function participants()
    {
        return $this->belongsToMany(Participant::class, 'project_participants', 'ProjectId', 'ParticipantId')
            ->withPivot('RoleOnProject', 'SkillRole');
    }

    public function outcomes()
    {
        return $this->hasMany(Outcome::class, 'ProjectId', 'ProjectId');
    }
}
