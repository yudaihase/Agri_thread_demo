<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (!Schema::hasTable('plans')) { //ブログのテーブルが無かったら作る
            Schema::create('plans', function (Blueprint $planstable) {
                $planstable->Increments('id'); //勝手に採番される
                $planstable->foreignId('user_id');
                $planstable->string('plan_place');
                $planstable->string('fund');
                $planstable->string('plan_area');
                $planstable->string('plan_crop');
                $planstable->text('introduction');
                $planstable->timestamps();
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
        Schema::dropIfExists('plans'); //指定したテーブルがあれば削除して、なければ何もしない（エラーを返さない）というメソッド
    }
}
