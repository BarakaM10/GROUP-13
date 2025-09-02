namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $primaryKey = 'ParticipantId';
    public $incrementing = true;

    protected $fillable = ['FullName', 'Email', 'Affiliation', 'Specialization', 'CrossSkillTrained', 'Institution'];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_participants', 'ParticipantId', 'ProjectId')
            ->withPivot('RoleOnProject', 'SkillRole');
    }
};
