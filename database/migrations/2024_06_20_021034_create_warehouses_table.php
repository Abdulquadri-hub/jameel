<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // WarehouseID INT PRIMARY KEY AUTO_INCREMENT,
        // Name VARCHAR(100) NOT NULL,
        // Location VARCHAR(255) NOT NULL
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->string("wid");
            $table->string('warehouse');
            $table->string('location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouses');
    }
};
