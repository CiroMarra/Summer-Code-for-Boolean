<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRatingToTodoItemsTable extends Migration
{
    public function up()
    {
        Schema::table('todo_items', function (Blueprint $table) {
            $table->tinyInteger('rating')->default(0); // Rating da 0 a 5
        });
    }

    public function down()
    {
        Schema::table('todo_items', function (Blueprint $table) {
            $table->dropColumn('rating');
        });
    }
}