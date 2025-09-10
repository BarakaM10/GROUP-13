<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->enum('affiliation', ['CS', 'SE', 'Engineering', 'Other'])->nullable();
            $table->enum('specialization', ['Software', 'Hardware', 'Business'])->nullable();
            $table->boolean('cross_skill_trained')->default(false);
            $table->enum('institution', ['SCIT', 'CEDAT', 'UniPod', 'UIRI', 'Lwera'])->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('participants');
    }
};