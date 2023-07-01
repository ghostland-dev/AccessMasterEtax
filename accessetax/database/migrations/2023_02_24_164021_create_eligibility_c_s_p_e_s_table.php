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
        Schema::create('eligibility_c_s_p_e_s', function (Blueprint $table) {
            $table->id();
            $table->string('siren')->nullable();
            $table->string('CodeNafmessage')->nullable();
            $table->boolean('SoumisRisqueFuitCO2')->nullable();
            $table->boolean('EligibiliteReduit')->nullable();
            $table->string('codeNaf')->nullable();
            $table->decimal('MotnantCSPETauxReduit', 12, 2, false)->nullable();
            $table->decimal('CAR', 12, 2, false)->nullable();
            $table->decimal('valeurAjouter', 12, 2, false)->nullable();
            $table->decimal('CSPEtauxPlein', 12, 2, false)->nullable();
            $table->decimal('RatioElectroIntense', 12, 2, false)->nullable();
            $table->decimal('NouveaTauxReduit', 12, 2, false)->nullable();
            $table->decimal('RemboursementClient', 12, 2, false)->nullable();
            $table->decimal('chiffreAffaireBrut_AE', 12, 2, false)->nullable();
            $table->decimal('chiffreAffaireNet_AE', 12, 2, false)->nullable();
            $table->timestamps();

            $table->foreignId('study_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eligibility_c_s_p_e_s');
    }
};
