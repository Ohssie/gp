<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function(Blueprint $table)
        {
            $table->increments('admin_id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('phone')->unique();
            $table->string('password', 60);
            $table->string('bank_name', 50);
            $table->string('account_number', 14);
            $table->string('account_name', 50);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admin');
    }
}
