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
        Schema::create('reduced_tax_boards', function (Blueprint $table) {
            $table->id();
            $table->string('titre', 100)->nullable()->default('text');
            $table->float('consommation_mkw', 100)->nullable()->default(0);
            $table->float('remuneration', 100)->nullable()->default(0);
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
        Schema::dropIfExists('reduced_tax_boards');
    }
};