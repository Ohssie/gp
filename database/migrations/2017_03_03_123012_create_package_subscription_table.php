<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageSubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_subscription', function(Blueprint $table)
        {
            $table->increments('sub_id');
            $table->integer('package_id');
            $table->string('username', 20);
            $table->string('upline_username', 20);
            $table->string('sub_key', 10);
            $table->string('status', 10)->default('incomplete');
            $table->timestamps();
        });
        
        /*Schema::table('package_subscription', function(Blueprint $table)
        {
            $table->foreign('package_id')->references('package_id')->on('packages')->onDelete('cascade');;
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('package_subscription');
    }
}
