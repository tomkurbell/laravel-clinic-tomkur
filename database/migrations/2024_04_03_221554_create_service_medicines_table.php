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
        Schema::create('service_medicines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            //category enum('medicines', 'consultation', 'others')
            $table->enum('category', ['medicines', 'consultation', 'others']);
            $table->decimal('price', 15, 2);
            $table->integer('quantity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_medicines');
    }
};
