<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('atendimentos', function (Blueprint $table) {

            $table->string('operador')
                  ->nullable()
                  ->after('status');

            $table->string('editor')
                  ->nullable()
                  ->after('operador');

        });
    }

    public function down(): void
    {
        Schema::table('atendimentos', function (Blueprint $table) {

            $table->dropColumn('operador');
            $table->dropColumn('editor');

        });
    }
};