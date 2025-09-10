<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    const AFFILIATIONS = ['CS', 'SE', 'Engineering', 'Other'];
    const SPECIALIZATIONS = ['Software', 'Hardware', 'Business'];
    const INSTITUTIONS = ['SCIT', 'CEDAT', 'UniPod', 'UIRI', 'Lwera'];

    protected $fillable = [
        'full_name', 'email', 'affiliation', 'specialization', 'cross_skill_trained', 'institution',
    ];

    public function projects()
    {
        return $this->hasMany(ProjectParticipant::class);
    }
}