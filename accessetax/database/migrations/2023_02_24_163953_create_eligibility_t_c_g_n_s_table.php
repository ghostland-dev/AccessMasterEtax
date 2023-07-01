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
            $table->string('siren')->nullable();
            $table->boolean('Validation03')->nullable();
            $table->boolean('Validation02')->nullable();
            $table->boolean('Validation01')->nullable();
            $table->boolean('fullvalidation')->nullable();
            $table->decimal('esitmationEconomie', 12, 2, false)->nullable();
            $table->decimal('SommeTotalTaxElecPlein', 12, 2, false)->nullable();
            $table->decimal('SommeTotalTaxGazPlein', 12, 2, false)->nullable();
            $table->decimal('SommeTotalTaxTCGNReduit', 12, 2, false)->nullable();
            $table->decimal('chiffreAffaireBrut_AE', 12, 2, false)->nullable();
            $table->decimal('chiffreAffaireNet_AE', 12, 2, false)->nullable();
            $table->decimal('consumAnGazKwh', 12, 2, false)->nullable();
            $table->decimal('consumAnElecKwh', 12, 2, false)->nullable();
            $table->decimal('valeurProduction', 12, 2, false)->nullable();
            $table->decimal('valeurAjouterEuro', 12, 2, false)->nullable();
            $table->decimal('achatGaz', 12, 2, false)->nullable();
            $table->decimal('achatPetroliers', 12, 2, false)->nullable();
            $table->decimal('achatChaleur', 12, 2, false)->nullable();
            $table->decimal('autres', 12, 2, false)->nullable();
            $table->decimal('consumAnAutreKwh', 12, 2, false)->nullable();
            $table->decimal('pourcentageConsuPorcessus', 12, 2, false)->nullable();
            $table->decimal('NaceCode', 12, 2, false)->nullable();
            $table->decimal('combustionProcessus', 12, 2, false)->nullable();
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
