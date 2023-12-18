<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // Inside the migration file
    public function up()
    {
        Schema::table('berita', function (Blueprint $table) {
            $table->string('image')->nullable()->after('desc'); // Adjust the position of the 'image' column as needed
        });
    }


    public function down()
    {
        Schema::table('berita', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
}
