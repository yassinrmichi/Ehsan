<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('associations', function (Blueprint $table) {
            $table->string('couverture')->nullable()->after('nom'); // 'nom' ou un autre champ existant
        });
    }

    public function down()
    {
        Schema::table('associations', function (Blueprint $table) {
            $table->dropColumn('couverture');
        });
    }

};
