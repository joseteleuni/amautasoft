<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mikrotiks', function (Blueprint $table) {

            //
            $table->id();
            //Insertados
            $table->string("nombre");
            $table->string("code");
            $table->boolean('shelly');
            $table->boolean('starlink');
            $table->boolean('fibra');
            $table->string("did");
            $table->string("implementacion");
            $table->bigInteger("num_tpe");
            
            //Calculados
            $table->bigInteger("puerto_pbx")->nullable($value = true);
            $table->bigInteger("puerto_winbox")->nullable($value = true);
            $table->string("dominio")->nullable($value = true);
            $table->string("ip")->nullable($value = true);
            //
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mikrotiks');
    }
};
