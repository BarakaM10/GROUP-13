<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $table = 'equipment';

    const USAGE_DOMAINS = ['Electronics', 'Mechanical', 'IoT'];
    const SUPPORT_PHASES = ['Training', 'Prototyping', 'Testing', 'Commercialization'];

    protected $fillable = [
        'facility_id', 'name', 'capabilities', 'description', 'inventory_code', 'usage_domain', 'support_phase',
    ];

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }
}