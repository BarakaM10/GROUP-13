<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('outcomes', function (Blueprint $table) {
            $table->id('OutcomeId');
            $table->foreignId('ProjectId')->constrained('projects', 'ProjectId')->onDelete('cascade');
            $table->string('Title');
            $table->text('Description')->nullable();
            $table->string('ArtifactLink')->nullable(); 
            $table->string('OutcomeType')->nullable(); 
            $table->string('QualityCertification')->nullable(); 
            $table->string('CommercializationStatus')->nullable(); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('outcomes');
    }
};
