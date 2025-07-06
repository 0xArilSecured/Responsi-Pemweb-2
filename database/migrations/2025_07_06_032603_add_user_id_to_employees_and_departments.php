<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id');
        });
        Schema::table('departments', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id');
        });
    }

    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
        Schema::table('departments', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
};
