<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {

            // Campo per l'URL del sito web associato al progetto
            $table->string('website_url')->nullable();

            // Campo per indicare se il progetto è attivo o no
            $table->boolean('is_active')->default(true);

            // Campo per la data di fine del progetto
            $table->date('end_date')->nullable();

        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('website_url');
            $table->dropColumn('is_active');
            $table->dropColumn('end_date');
        });
    }
};
