<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->id('FacilityId');
            $table->string('Name');
            $table->string('Location')->nullable();
            $table->text('Description')->nullable();
            $table->string('PartnerOrganization')->nullable();
            $table->string('FacilityType')->nullable();
            $table->string('Capabilities')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('facilities');
    }
};
