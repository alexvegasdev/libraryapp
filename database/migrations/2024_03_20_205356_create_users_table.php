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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->char('dni', length:8);
            $table->string('firstname', length:80);
            $table->string('lastname', length:80);
            $table->char('phone', length:9);
            $table->string('email', length:80);
            $table->string('password', length:250);
            $table->char('address', length:80);
            //$table->foreignId('role_id')->constrained('roles');
            $table->timestamps();
            $table->softDeletes();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
