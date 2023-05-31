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
        Schema::create('eligibility_t_c_g_n_s', function (Blueprint $table) {
            $table->id();
            $table->boolean('Validation03')->nullable();
            $table->boolean('Validation02')->nullable();
            $table->boolean('Validation01')->nullable();
            $table->boolean('fullvalidation')->nullable();
            $table->float('esitmationEconomie')->nullable();
            $table->float('SommeTotalTaxElecPlein')->nullable();
            $table->float('SommeTotalTaxGazPlein')->nullable();
            $table->float('SommeTotalTaxTCGNReduit')->nullable();
            $table->float('chiffreAffaireBrut_AE')->nullable();
            $table->float('chiffreAffaireNet_AE')->nullable();
            $table->float('consumAnGazKwh')->nullable();
            $table->float('consumAnElecKwh')->nullable();
            $table->float('valeurProduction')->nullable();
            $table->float('valeurAjouterEuro')->nullable();
            $table->float('achatGaz')->nullable();
            $table->float('achatPetroliers')->nullable();
            $table->float( 'achatChaleur')->nullable();
            $table->float('autres')->nullable();
            $table->float('consumAnAutreKwh')->nullable();
            $table->float('pourcentageConsuPorcessus')->nullable();
            $table->float( 'NaceCode')->nullable();
            $table->float( 'combustionProcessus')->nullable();
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
        Schema::dropIfExists('eligibility_t_c_g_n_s');
    }
};
