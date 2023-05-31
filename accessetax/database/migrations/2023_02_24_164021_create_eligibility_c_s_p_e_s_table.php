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
            $table->string('CodeNafmessage')->nullable();
            $table->float('MotnantCSPETauxReduit')->nullable();
            $table->float('CAR')->nullable();
            $table->float('valeurAjouter')->nullable();
            $table->string('codeNaf')->nullable();
            $table->float('CSPEtauxPlein')->nullable();
            $table->boolean('EligibiliteReduit')->nullable();
            $table->float('RatioElectroIntense')->nullable();
            $table->boolean('SoumisRisqueFuitCO2')->nullable();
            $table->float('NouveaTauxReduit')->nullable();
            $table->float('RemboursementClient')->nullable();
            $table->float('chiffreAffaireBrut_AE')->nullable();
            $table->float('chiffreAffaireNet_AE')->nullable();
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
