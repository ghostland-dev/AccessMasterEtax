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
            $table->integer('compteur_c5');
            $table->integer('compteur_c4');
            $table->integer('compteur_hta');
            $table->integer('compteur_t2');
            $table->integer('compteur_t3');
            $table->integer('compteur_t4');

            $table->foreignId('company_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade')->nullable();



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
