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
        Schema::create('incoming_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_code');
            $table->date('date_of_entry');
            $table->integer('quantity_entered');
            $table->string('supplier_code');
            $table->timestamps();
    
            $table->foreign('item_code')->references('item_code')->on('items')->onDelete('cascade');
            $table->foreign('supplier_code')->references('supplier_code')->on('suppliers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incoming_items');
    }
};
