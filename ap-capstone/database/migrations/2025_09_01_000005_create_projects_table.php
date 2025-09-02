<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id('ProjectId');
            $table->foreignId('ProgramId')->constrained('programs', 'ProgramId')->onDelete('cascade');
            $table->foreignId('FacilityId')->constrained('facilities', 'FacilityId')->onDelete('cascade');
            $table->string('Title');
            $table->string('NatureOfProject')->nullable();
            $table->text('Description')->nullable();
            $table->string('InnovationFocus')->nullable();
            $table->string('PrototypeStage')->nullable();
            $table->string('TestingRequirements')->nullable();
            $table->text('CommercializationPlan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
