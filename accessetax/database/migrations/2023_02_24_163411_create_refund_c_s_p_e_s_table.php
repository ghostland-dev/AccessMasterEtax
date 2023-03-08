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
        Schema::create('refund_c_s_p_e_s', function (Blueprint $table) {
            $table->id();
            $table->string('annee');
            $table->string('entreprise');
            $table->string('siren');
            $table->string('code_naf');
            $table->float('veleur_ajoutee')->nullable()->default(123.45);
            $table->float('car')->nullable()->default(123.45);
            $table->string('unite', 10)->nullable()->default('kw/€');
            $table->date('date_verification')->nullable()->default(new DateTime());
            $table->boolean('elegibilite_activite')->nullable()->default(false);
            $table->boolean('eliegibilite_elec_intense')->nullable()->default(false);
            $table->timestamps();

            $table->index('study_id');
            $table->foreign('study_id')->references('id')->on('studies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refund_c_s_p_e_s');
    }
};
