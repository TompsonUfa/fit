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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('blocked');
            $table->dropColumn('account_expiry_date');

            $table->timestamp('blocked_at')->nullable();
            $table->timestamp('access_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('blocked')->default(false);
            $table->timestamp('account_expiry_date');

            $table->dropColumn('blocked_at');
            $table->dropColumn('access_at');
        });
    }
};
