<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeHospitalTableColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hospitals', function (Blueprint $table) {
            $table->integer('available_seat')->default(0)->change();
            $table->string('address', 200)->nullable()->change();
        });

        Schema::table('ambulances', function (Blueprint $table) {
            $table->string('name', 191)->nullable()->change();
            $table->string('hospital_name', 191)->nullable()->change();
            $table->string('address', 200)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
