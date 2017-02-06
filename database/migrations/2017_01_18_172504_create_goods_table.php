<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropifexists('goods');
        Schema::create('goods', function(Blueprint $table)
        {
            // 存储引擎
            $table->engine = 'InnoDB';
            
            // 字段设置
            $table->increments('id');
            $table->integer('cate_id')->default(0);
            $table->string('cate_path');
            $table->integer('store_id')->default(0);
            $table->string('name', 200);
            $table->tinyInteger('type')->default(0);
            $table->string('goods_sn', 50)->nullable();
            $table->string('barcode',50)->nullable();
            $table->float('market_price')->nullable();
            $table->float('price');
            $table->integer('stock')->default(0);
            $table->tinyInteger('is_add')->defalut(0);
            $table->integer('sort')->default(100);
            $table->string('img', 200)->nullable();
            $table->string('img_thumb', 200)->nullable();
            $table->string('img_thumb_min', 200)->nullable();
            $table->timestamps();
            $table->softDeletes();   // 添加 deleted_at 列
            
            // 索引设置
            $table->index('cate_id');
            $table->index('store_id');
            
//            $table->text('json_field')->nullable();
//            $table->index('article_id');
//            $table->Integer('zan_num')->default(0);
//            $table->string('email')->unique();
//            $table->string('password', 60);
//            $table->rememberToken();
//            $table->tinyInteger('star_level');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('goods');
    }
}
