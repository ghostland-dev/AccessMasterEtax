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
        Schema::create('base_folders', function (Blueprint $table) {
            $table->id();
            $table->string('numero_dossier')->nullable()->default(null);
            $table->enum('statut_dossier', ['en attente','en cours', 'traité', 'prêt à envoyé','envoyé','confirmé','rélgé','finalisé'])->default('rélgé');
            $table->string('nom_dossier')->nullable()->default(null);
            $table->string('nom_client')->nullable()->default(null);

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
        Schema::dropIfExists('base_folders');
    }
};
