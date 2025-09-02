<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'email',
        'affiliation',
        'specialization',
        'cross_skill_trained',
        'institution'
    ];
    protected $casts = ['cross_skill_trained' => 'boolean'];
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_participant')
            ->withPivot(['role_on_project', 'skill_role'])
            ->withTimestamps();
    }
}
public function projects()
{
    return $this->belongsToMany(Project::class, 'project_participants', 'ParticipantId', 'ProjectId')
        ->withPivot('RoleOnProject', 'SkillRole');
}