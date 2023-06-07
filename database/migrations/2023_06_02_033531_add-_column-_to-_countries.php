<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('apps_countries', function (Blueprint $table) {
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('apps_countries', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropTimestamps();
        });
    }
};
