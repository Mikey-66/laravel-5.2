<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSysuserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sysuser', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('tname', 60)->nullable();
            $table->string('password', 60);
            $table->tinyInteger('role_id')->defalut(0);
            $table->tinyInteger('locked')->defalut(0);
            $table->rememberToken();
            $table->timestamps();
            
            $table->index('role_id');
            $table->index('locked');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sysuser');
    }
}
