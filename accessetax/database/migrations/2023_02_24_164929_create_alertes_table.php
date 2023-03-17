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
        Schema::create('alertes', function (Blueprint $table) {
            $table->id();
            $table->string('nom_alerte')->nullable()->default("nouv alerte");
            $table->string('description_alerte')->nullable()->default(null);
            $table->enum('type_alerte', ['information', 'urgent','important','indipensable','alerte','rappel'])->nullable()->default('information');
            $table->string('statut_alerte')->nullable()->default(null);


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
        Schema::dropIfExists('alertes');
    }
};
