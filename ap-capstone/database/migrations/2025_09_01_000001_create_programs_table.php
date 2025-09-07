<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id('ProgramId');
            $table->string('Name');
            $table->text('Description')->nullable();
            $table->string('NationalAlignment')->nullable();
            $table->string('FocusAreas')->nullable();
            $table->string('Phases')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
