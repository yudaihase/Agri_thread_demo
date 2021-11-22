<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (!Schema::hasTable('farms')) { //ブログのテーブルが無かったら作る
            Schema::create('farms', function (Blueprint $farmstable) {
                $farmstable->Increments('id'); //勝手に採番される
                $farmstable->foreignId('user_id');
                $farmstable->string('farm_name');
                $farmstable->text('introduction');
                $farmstable->string('farm_link')->nullable();
                $farmstable->string('farm_area');
                $farmstable->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() //downメソッドはupメソッドが行った操作を元に戻す
    {
        Schema::dropIfExists('farms'); //指定したテーブルがあれば削除して、なければ何もしない（エラーを返さない）というメソッド
    }
}
