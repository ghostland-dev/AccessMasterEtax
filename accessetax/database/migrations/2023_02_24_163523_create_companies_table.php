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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('denomenation');
            $table->string('siren');
            $table->string('siret');
            $table->string('forme_juridique');
            $table->string('forme_juridique_code');
            $table->string('capital');
            $table->string('effectif');
            $table->integer('nb_dirigents')->unsigned()->nullable()->default(1);
            $table->string('categorie_juridique');
            $table->string('adresse');
            $table->string('code_postal');
            $table->string('ville');
            $table->string('code_naf');
            $table->string('code_nace');
            $table->string('site_internet');
            $table->string('nic');
            $table->string('nic_siege');
            $table->string('date_creation');
            $table->string('date_radiation');
            $table->string('date_immatriculation');
            $table->string('date_immatriculation_rcs');
            $table->timestamps();

            $table->foreign('user_id')->references('users')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
