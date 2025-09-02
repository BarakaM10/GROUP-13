use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id('ParticipantId');
            $table->string('FullName');
            $table->string('Email')->unique();
            $table->string('Affiliation')->nullable();
            $table->string('Specialization')->nullable();
            $table->boolean('CrossSkillTrained')->default(false);
            $table->string('Institution')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
