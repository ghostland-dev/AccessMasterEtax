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
            $table->string('numero_dossier')->nullable()->default(Str::random($length = 10))->unique();
            $table->enum('statut_dossier', ['en attente','en cours', 'traité', 'prêt à envoyé','envoyé','confirmé','rélgé','finalisé'])->nullable()->default(['en attente']);
            $table->string('nom_dossier')->nullable()->default(null);
            $table->string('nom_client')->nullable()->default(null);

            $table->foreignId('study_id')->constrained('studies')->onDelete('cascade');
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
