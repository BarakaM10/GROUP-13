namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{
    use HasFactory;

    protected $primaryKey = 'OutcomeId';
    public $incrementing = true;

    protected $fillable = [
        'ProjectId', 'Title', 'Description', 'OutcomeType',
        'QualityCertification', 'CommercializationStatus'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'ProjectId', 'ProjectId');
    }
};
