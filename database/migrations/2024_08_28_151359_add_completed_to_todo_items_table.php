<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompletedToTodoItemsTable extends Migration
{
    public function up()
    {
        Schema::table('todo_items', function (Blueprint $table) {
            $table->boolean('completed')->default(false);
        });
    }

    public function down()
    {
        Schema::table('todo_items', function (Blueprint $table) {
            $table->dropColumn('completed');
        });
    }
}