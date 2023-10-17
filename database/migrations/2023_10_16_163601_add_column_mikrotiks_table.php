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
        Schema::table('mikrotiks', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('provincia_id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mikrotiks', function (Blueprint $table) {
            //
            $table->dropColumn('departamento_id');
            $table->dropColumn('provincia_id');
        });
    }
};
