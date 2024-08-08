<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id()->primary();
            $table->uuid('uuid')->unique();
            $table->char('user_id');
            $table->string('title');
            $table->text('body');
            $table->timestamps();

            $table->foreign('user_id')->references('uuid')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
