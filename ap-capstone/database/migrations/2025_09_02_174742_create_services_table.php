<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->id('EquipmentId');
            $table->foreignId('FacilityId')->constrained('facilities', 'FacilityId')->onDelete('cascade');
            $table->string('Name');
            $table->string('Capabilities')->nullable();
            $table->text('Description')->nullable();
            $table->string('InventoryCode')->nullable();
            $table->string('UsageDomain')->nullable();
            $table->string('SupportPhase')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('equipment');
    }
};

