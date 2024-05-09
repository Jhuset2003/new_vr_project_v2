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
        Schema::create('webarts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->require();
            $table->string('img_back')->require()->unique();
            $table->string('img_webart')->require()->unique();
            $table->string('target')->require()->unique();
            $table->string('musica');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webarts');
    }
};
