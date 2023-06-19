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
            $table->unsignedBigInteger('city_id')->nullable();
            $table->index('city_id', 'page_course_city_idx');
            $table->foreign('city_id', 'page_course_city_fk')->on('cities')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColumn('city_id');
    }
};
