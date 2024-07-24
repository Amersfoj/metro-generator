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
        Schema::create('funcs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name", 255);
            $table->string("description", 512);
            $table->bigInteger('pack_id')->unsigned();
            $table->foreign('pack_id')->references('id')->on('datapacks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcs');
    }
};
