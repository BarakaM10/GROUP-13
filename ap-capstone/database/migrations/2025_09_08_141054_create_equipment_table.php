<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facility_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('capabilities')->nullable();
            $table->text('description')->nullable();
            $table->string('inventory_code')->nullable();
            $table->enum('usage_domain', ['Electronics', 'Mechanical', 'IoT'])->nullable();
            $table->enum('support_phase', ['Training', 'Prototyping', 'Testing', 'Commercialization'])->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipment');
    }
};