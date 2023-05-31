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
        Schema::create('responsibles', function (Blueprint $table) {
            $table->id();

            $table->string('civilite')->nullable();
            $table->string('nom_famille');
            $table->string('prenom');
            $table->string('fonction');
            $table->string('email');
            $table->string('mobile');
            $table->string('fax');
            $table->string('adresse');
            $table->string('code_postal');
            $table->string('ville');
            $table->string('pays');
            $table->string('date_naissance')->nullable();
            $table->timestamps();

            $table->foreignId('company_id')
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
        Schema::dropIfExists('responsibles');
    }
};
