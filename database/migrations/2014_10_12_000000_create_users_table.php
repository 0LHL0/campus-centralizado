<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')
                  ->constrained('roles')
                  ->onDelete('restrict');
            $table->foreignId('institution_id')
                  ->constrained()
                  ->cascadeOnDelete();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            // remember_token — Laravel lo usa para mantener la sesión activa
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
