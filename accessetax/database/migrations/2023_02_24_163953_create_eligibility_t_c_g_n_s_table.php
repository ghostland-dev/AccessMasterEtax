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
        Schema::create('eligibility_t_c_g_n_s', function (Blueprint $table) {
            $table->id();
            $table->float('valuer_ajoutee')->nullable()->default(1);
            $table->float('car_gaz')->nullable()->default(1);
            $table->float('car_elec')->nullable()->default(1);
            $table->float('car_autre')->nullable()->default(1);
            $table->float('valeur_production')->nullable()->default(1);
            $table->float('achat_prod_gaz')->nullable()->default(1);
            $table->float('achat_prod_petrol')->nullable()->default(1);
            $table->float('achat_chatleur')->nullable()->default(1);
            $table->float('achat_autres_prod')->nullable()->default(1);
            $table->boolean('eligibilite')->nullable()->default(false);
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
        Schema::dropIfExists('eligibility_t_c_g_n_s');
    }
};
