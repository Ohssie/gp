<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function(Blueprint $table)
        {
            $table->increments('package_id');
            $table->string('package_name', 25);
            $table->integer('depth')->default(2);
            $table->integer('size')->default(2);
            $table->string('color', 14)->default('primary');
            $table->decimal('cost', 10, 2)->default(5000.00);
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
        Schema::drop('packages');
    }
}
