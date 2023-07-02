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
        Schema::table('page_courses', function (Blueprint $table) {
           $table->integer('time');
           $table->timestamp('date')->nullable();
           $table->string('desc');
           $table->integer('old_price')->nullable();
           $table->integer('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_courses', function (Blueprint $table) {
            $table->dropColumn('time');
            $table->dropColumn('date');
            $table->dropColumn('desc');
            $table->dropColumn('old_price');
            $table->dropColumn('price');
        });
    }
};
