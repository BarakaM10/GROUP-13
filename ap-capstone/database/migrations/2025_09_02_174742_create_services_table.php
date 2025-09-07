<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id('ServiceId');
            $table->foreignId('FacilityId')->constrained('facilities', 'FacilityId')->onDelete('cascade');
            $table->string('Name');
            $table->text('Description')->nullable();
            $table->string('Category')->nullable();
            $table->string('SkillType')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};

