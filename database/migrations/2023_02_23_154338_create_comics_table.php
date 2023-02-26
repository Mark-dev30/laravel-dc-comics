<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //FUNZIONE PER L'INSERIMENTO DELLA TABELLA NEL DATABASE
    public function up()
    {
        Schema::create('comics', function (Blueprint $table) {
            /* INSERIMENTO DI OGNI COLONNA */
            $table->id();
            $table->text('title');
            $table->text('description');
            $table->text('thumb');
            $table->decimal('price', 5, 2)->nullable();
            $table->text('series')->nullable();
            $table->date('sale_date')->nullable();
            $table->text('type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    //FUNZIONE PER L'ELIMINAZIONE' DELLA TABELLA NEL DATABASE
    public function down()
    {
        Schema::dropIfExists('comics');
    }
};
