<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('project_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->foreignId('participant_id')->constrained()->onDelete('cascade');
            $table->enum('role_on_project', ['Student', 'Lecturer', 'Contributor'])->nullable();
            $table->enum('skill_role', ['Developer', 'Engineer', 'Designer', 'Business Lead'])->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_participants');
    }
};