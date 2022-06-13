<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 50);
            $table->string('body', 200);
            $table->integer('user_id')->unsigned();
            $table->integer('class_id')->unsigned();
            $table->timestamps();
        //unsigned()型で定義
        //'category_id' は 'categoriesテーブル' の 'id' を参照する外部キーです
        //外部キーを設定するときは、そのカラムをunsigned()型で設定する
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brings');
    }
}
