<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::table('janjitemu', function (Blueprint $table) {
            $table->dropColumn('no_hp');
        });
    }

    public function down()
    {
        Schema::table('janjitemu', function (Blueprint $table) {
            $table->string('no_hp')->nullable(); // atau sesuaikan dengan struktur aslinya
        });
    }
};
