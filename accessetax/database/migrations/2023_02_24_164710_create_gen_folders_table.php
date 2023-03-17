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
        Schema::create('gen_folders', function (Blueprint $table) {
            $table->id();
            $table->string('numero_dossier')->nullable()->default(null);
            $table->enum('statut_dossier', ['en attente','en cours', 'traité', 'prêt à envoyé','envoyé','confirmé','rélgé','complet','finalisé'])->nullable()->default('en attente');
            $table->string('nom_dossier')->nullable()->default(null);
            $table->string('attestation_non_rembourse')->nullable()->default(null);
            $table->string('pouvoir_client')->nullable()->default(null);
            $table->string('contrat_de_prestation')->nullable()->default(null);
            $table->string('demande_rembourse')->nullable()->default(null);
            $table->string('courrier_cerfa')->nullable()->default(null);
            $table->string('client_cerfa_14317_07')->nullable()->default(null);
            $table->string('client_cerfa_14318_08')->nullable()->default(null);
            $table->string('client_cerfa_14700_03')->nullable()->default(null);
            $table->string('client_cerfa_14319')->nullable()->default(null);
            $table->string('client_pouvoir_ae')->nullable()->default(null);
            $table->string('proposition_service')->nullable()->default(null);

            $table->foreignId('base_folder_id')
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
        Schema::dropIfExists('gen_folders');
    }
};
