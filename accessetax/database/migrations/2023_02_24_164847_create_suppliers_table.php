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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable()->default(null);
            $table->string('nom_fournisseur')->nullable()->default(null);
            $table->string('contact', 100)->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->string('tel')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->boolean('fournisseur_electrcite')->nullable()->default(null);
            $table->boolean('fournisseur_gaz')->nullable()->default(null);
            $table->string('country')->nullable()->default(null);
            $table->string('zip_code')->nullable()->default(null);
            $table->string('siret')->nullable()->default(null);
            $table->integer('energie')->nullable()->default(1);
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
        Schema::dropIfExists('suppliers');
    }
};
