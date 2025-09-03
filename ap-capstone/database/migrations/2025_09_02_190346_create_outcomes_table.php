<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('outcomes', function (Blueprint $table) {
            $table->id('OutcomeId');
            $table->foreignId('ProjectId')->constrained('projects', 'ProjectId')->onDelete('cascade');
            $table->string('Title');
            $table->text('Description')->nullable();
            $table->string('ArtifactLink')->nullable(); // For file path or external link (Week 2)
            $table->string('OutcomeType')->nullable(); // Metadata (Week 2)
            $table->string('QualityCertification')->nullable(); // Metadata (Week 2)
            $table->string('CommercializationStatus')->nullable(); // Metadata (Week 2)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outcomes');
    }
};
