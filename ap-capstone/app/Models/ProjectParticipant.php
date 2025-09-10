<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectParticipant extends Model
{
    use HasFactory;

    protected $table = 'project_participants';

    const ROLES_ON_PROJECT = ['Student', 'Lecturer', 'Contributor'];
    const SKILL_ROLES = ['Developer', 'Engineer', 'Designer', 'Business Lead'];

    protected $fillable = [
        'project_id', 'participant_id', 'role_on_project', 'skill_role',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
}