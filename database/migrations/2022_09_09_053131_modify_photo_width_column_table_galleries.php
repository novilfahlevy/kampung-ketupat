<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('galleries', function(Blueprint $table) {
            $table->integer('photo_width')->nullable()->change();
            $table->integer('photo_height')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('galleries', function(Blueprint $table) {
            $table->integer('photo_width')->nullable(false)->change();
            $table->integer('photo_height')->nullable(false)->change();
        });
    }
};
