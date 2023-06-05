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
        Schema::create('gaz_meters', function (Blueprint $table) {
            $table->id();
            $table->string('PCE')->nullable()->default('GR-0');
            $table->string('siret')->nullable()->default('0000');
            $table->string('nom_site')->nullable()->default('nom_site');
            $table->string('nom_etude')->nullable()->default('nom_etude');
            $table->string('nom_client')->nullable()->default('nom_client');
            $table->string('nom_contact')->nullable()->default('nom_contact');
            $table->string('nom_responsable')->nullable()->default('nom_responsable');
            $table->enum('profil', ['T1', 'T2', 'T3', 'T4', 'T5'])->nullable();
            $table->enum('tarif', ['P19', 'P18', 'P17', 'P16', 'P15', 'P14', 'P13', 'P12', 'P11'])->nullable();
            $table->float('consommation_mentsauelle')->nullable()->default(1);
            $table->float('consommation_annuelle')->nullable()->default(1);


            $table->foreignId('study_id')
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
        Schema::dropIfExists('gaz_meters');
    }
};
