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
        Schema::create('category_lots', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('category_id')->unsigned();
            $table->unsignedBigInteger('lot_id')->unsigned();

            $table->foreign('category_id')->references('id')
                ->on('categories')->onDelete('cascade');

            $table->foreign('lot_id')->references('id')
                ->on('lots')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_lots');
    }
};
