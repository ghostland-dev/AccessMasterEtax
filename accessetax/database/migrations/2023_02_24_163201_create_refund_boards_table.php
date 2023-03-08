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
        Schema::create('refund_boards', function (Blueprint $table) {
            $table->id();
            $table->string('titre')->nullable()->default(null);
            $table->float('consummation_mkw')->nullable()->default(150);
            $table->float('remuneration')->nullable()->default(30);
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
        Schema::dropIfExists('refund_boards');
    }
};
