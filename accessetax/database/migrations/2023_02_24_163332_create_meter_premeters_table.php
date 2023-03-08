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
    public function up()
    {
        Schema::create('meter_premeters', function (Blueprint $table) {
            $table->id();
            $table->int('compteur_c5');
            $table->int('compteur_c4');
            $table->int('compteur_hta');
            $table->int('compteur_t2');
            $table->int('compteur_t3');
            $table->int('compteur_t4');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meter_premeters');
    }
};
