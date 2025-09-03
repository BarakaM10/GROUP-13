<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('project_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ProjectId')->constrained('projects', 'ProjectId')->onDelete('cascade');
            $table->foreignId('ParticipantId')->constrained('participants', 'ParticipantId')->onDelete('cascade');
            $table->string('RoleOnProject')->nullable();
            $table->string('SkillRole')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_participants');
    }
};
