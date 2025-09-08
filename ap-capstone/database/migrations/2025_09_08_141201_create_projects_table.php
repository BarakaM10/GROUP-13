<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained()->onDelete('cascade');
            $table->foreignId('facility_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->enum('nature_of_project', ['Research', 'Prototype', 'Applied'])->nullable();
            $table->text('description')->nullable();
            $table->string('innovation_focus')->nullable();
            $table->enum('prototype_stage', ['Concept', 'Prototype', 'MVP', 'Market Launch'])->nullable();
            $table->text('testing_requirements')->nullable();
            $table->text('commercialization_plan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
};