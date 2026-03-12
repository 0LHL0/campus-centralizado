<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            // Define si el mensaje va dirigido a un ciclo o a un grado
            $table->enum('recipient_type', ['cycle', 'grade']);
            // Si recipient_type es 'grade', aquí se guarda el nombre del grado
            $table->string('grade')->nullable();
            $table->timestamp('sent_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
