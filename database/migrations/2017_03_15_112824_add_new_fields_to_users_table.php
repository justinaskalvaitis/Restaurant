<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname');
            $table->date('dateofbirth');
            $table->string('phonenumber');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->integer('zipcode');
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
            $table->string('surname');
            $table->date('dateofbirth');
            $table->string('phonenumber');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->integer('zipcode');
        });
    }
}
