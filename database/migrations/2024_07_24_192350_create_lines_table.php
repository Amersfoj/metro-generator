<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lines', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name", 255)->nullable();
            $table->string("from", 32);
            $table->string("to", 32)->nullable();
            $table->string('block', 255);
            $table->bigInteger('func_id')->unsigned();
            $table->foreign('func_id')->references('id')->on('funcs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lines');
    }
};
