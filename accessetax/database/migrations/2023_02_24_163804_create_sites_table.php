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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('siret');
            $table->string('adresse');
            $table->string('code_postal');
            $table->string('ville');
            $table->string('pays');
            $table->string('telephone');
            $table->string('fax');
            $table->string('email');
            $table->float('consommation_electrcite')->nullable()->default(1);
            $table->float('consommation_gaz')->nullable()->default(1);
            $table->string('type', 100)->nullable()->default('site énérgiévore');
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
        Schema::dropIfExists('sites');
    }
};
