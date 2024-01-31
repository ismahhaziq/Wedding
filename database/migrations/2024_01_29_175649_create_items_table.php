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
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->double('price', 8, 2)->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->Integer('total_guests')->nullable();
            $table->double('total_amount', 8, 2)->nullable();
            $table->unsignedInteger('selected_package')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
