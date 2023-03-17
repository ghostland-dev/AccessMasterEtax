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
        Schema::create('elec_meters', function (Blueprint $table) {
            $table->id();
            $table->string('nom_compteur');
            $table->string('PDL');
            $table->float('puissance')->nullable()->default(123.45);
            $table->string('numero_client');
            $table->string('numero_site');
            $table->string('numero_etude');
            $table->string('numero_contrat');
            $table->string('fournisseur');
            $table->enum('profile', ['C1','C2','C3','C4','C5'])->nullable();
            $table->string('consommation');
            $table->string('annee');

             $table->foreignId('site_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('elec_meters');
    }
};
