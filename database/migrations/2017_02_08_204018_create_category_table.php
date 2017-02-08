<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function(Blueprint $table)
        {
            // 存储引擎
            $table->engine = 'InnoDB';
            // 字段设置
            $table->increments('id');
            $table->string('name', 30);
            $table->string('alias', 50)->nullable();
            $table->string('cate_path', 100);
            $table->integer('pid')->default(0);
            $table->tinyInteger('type')->nullable();
            $table->string('logo', 200)->nullable();
            $table->string('link', 200)->nullable();
            $table->tinyInteger('is_show')->default(1); // 是否展示
            $table->integer('sort')->default(100);
            $table->timestamps();
            
            // 索引设置
            $table->index('pid');
            $table->index('cate_path');
            $table->index('sort');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('category');
    }
}
