<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('stocks', function (Blueprint $table) {
            $table->string('item_code')->primary();
            $table->integer('quantity_of_incoming_items')->default(0);
            $table->integer('quantity_of_outgoing_items')->default(0);
            $table->integer('total_items')->default(0); 
            $table->timestamps();

            $table->foreign('item_code')->references('item_code')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
