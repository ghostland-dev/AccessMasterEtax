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
        Schema::create('gaz_contracts', function (Blueprint $table) {
            $table->id();
            $table->string('nom_contrat');
            $table->string('fournisseur');
            $table->date('date_debut')->nullable()->default(new DateTime());
            $table->date('date_fin')->nullable()->default(new DateTime());
            $table->date('date_signature')->nullable()->default(new DateTime());
            $table->foreign('gaz_meter_id')->references('gaz_meter_id')->on('gaz_meters')->onDelete('cascade');

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
        Schema::dropIfExists('gaz_contracts');
    }
};
