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
        Schema::create('base_documents', function (Blueprint $table) {
            $table->id();
            $table->string('cgv_access_anergies')->nullable()->default(null);
            $table->string('rib_entreprise')->nullable()->default(null);
            $table->string('kabis')->nullable()->default(null);
            $table->string('bilan_comptable_1')->nullable()->default(null);
            $table->string('bilan_comptable_2')->nullable()->default(null);
            $table->string('annexe_1')->nullable()->default(null);
            $table->string('annexe_2')->nullable()->default(null);
            $table->string('courrier_type')->nullable()->default(null);
            $table->string('confirmation_douanaire')->nullable()->default(null);
            $table->string('fichier_entreprise')->nullable()->default(null);
            $table->string('valeur_ajoutee')->nullable()->default(null);

            $table->foreignId('base_folder_id')->constrained('base_folders')->onDelete('cascade');
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
        Schema::dropIfExists('base_documents');
    }
};
