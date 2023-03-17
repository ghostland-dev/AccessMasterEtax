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
        Schema::create('gaz_bills', function (Blueprint $table) {
            $table->id();
            $table->string('nom_facture', 100)->nullable();
            $table->string('fournisseur', 100)->nullable();
            $table->string('type', 100)->nullable();
            $table->string('numero_facture', 100)->nullable();
            $table->string('numero_contrat', 100)->nullable();
            $table->string('numero_compteur', 100)->nullable();
            $table->string('numero_client', 100)->nullable();
            $table->string('numero_site', 100)->nullable();
            $table->string('numero_etude', 100)->nullable();
            $table->string('consommation', 100)->nullable();
            $table->string('annee', 100)->nullable();

            $table->foreignId('gaz_contract_id')
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
        Schema::dropIfExists('gaz_bills');
    }
};
