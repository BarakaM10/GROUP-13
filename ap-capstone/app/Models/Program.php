<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $primaryKey = 'ProgramId';
    public $incrementing = true;

    protected $fillable = ['Name', 'Description', 'NationalAlignment', 'FocusAreas', 'Phases'];

    public function projects()
    {
        return $this->hasMany(Project::class, 'ProgramId', 'ProgramId');
    }
}
