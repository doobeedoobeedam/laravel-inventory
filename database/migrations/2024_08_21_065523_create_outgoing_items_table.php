<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('outgoing_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_code');
            $table->date('date_of_exit');
            $table->integer('quantity_exited');
            $table->string('purpose')->nullable();
            $table->timestamps();
    
            $table->foreign('item_code')->references('item_code')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outgoing_items');
    }
};
