<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToTripsTable extends Migration
{
    public function up()
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->string('image')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
}