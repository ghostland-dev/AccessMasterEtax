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
        Schema::create('elec_contracts', function (Blueprint $table) {
            $table->id();
            $table->string('nom_contrat');
            $table->string('fournisseur');
            $table->string('fichier');
            $table->date('date_debut')->nullable()->default(null);
            $table->date('date_fin')->nullable()->default(null);
            $table->date('date_signature')->nullable()->default(null);

            $table->foreignId('elec_meter_id')
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
        Schema::dropIfExists('elec_contracts');
    }
};
