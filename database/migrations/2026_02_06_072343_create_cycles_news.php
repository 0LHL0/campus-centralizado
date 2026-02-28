
<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

return new class extends Migration

{

    public function up(): void

    {

        // cycle_news es la tabla pivote que conecta ciclos con noticias

        // Laravel espera el nombre en singular y orden alfabético: cycle_news

        Schema::create('cycle_news', function (Blueprint $table) {

            $table->id();

            // cycle_id apunta a la tabla cycles

            $table->foreignId('cycle_id')

                  ->constrained()

                  ->cascadeOnDelete();

            // news_id apunta a la tabla news

            $table->foreignId('news_id')

                  ->constrained()

                  ->cascadeOnDelete();

            $table->timestamps();

        });

    }



    public function down(): void

    {

        Schema::dropIfExists('cycle_news');

    }

};

