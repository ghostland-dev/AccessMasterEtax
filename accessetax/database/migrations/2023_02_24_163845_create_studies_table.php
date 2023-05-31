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
        Schema::create('studies', function (Blueprint $table) {
            $table->id();
            $table->string('nom_etude');
            $table->string('nom_client');
            $table->string('nom_contact');
            $table->string('nom_responsable');
            $table->dateTime('date_debut')->nullable()->default(null);
            $table->dateTime('date_fin')->nullable()->default(null);
            $table->timestamps();
            $table->foreignId('site_id')
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
        Schema::dropIfExists('studies');
    }
};
