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
            $table->date('date_debut')->nullable()->default(new DateTime());
            $table->date('date_fin')->nullable()->default(new DateTime());
            $table->date('date_signature')->nullable()->default(new DateTime());
            $table->foreign('elec_meter_id')->references('elec_meter_id')->on('elec_meters')->onDelete('cascade');

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
