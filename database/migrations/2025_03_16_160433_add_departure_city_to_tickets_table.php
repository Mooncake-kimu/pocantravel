<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDepartureCityToTicketsTable extends Migration
{
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->string('departure_city')->after('bus_id'); // Menambahkan kolom departure_city
            $table->string('destination_city')->after('departure_city'); // Menambahkan kolom destination_city jika belum ada
        });
    }

    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropColumn('departure_city'); // Menghapus kolom jika migrasi dibatalkan
            $table->dropColumn('destination_city'); // Menghapus kolom jika migrasi dibatalkan
        });
    }
}