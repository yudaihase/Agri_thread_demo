<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (!Schema::hasTable('plan_comments')) { //ブログのテーブルが無かったら作る
            Schema::create('plan_comments', function (Blueprint $plan_commentstable) {
                $plan_commentstable->Increments('id'); //勝手に採番される
                $plan_commentstable->foreignId('user_id');
                $plan_commentstable->foreignId('plan_id');
                $plan_commentstable->text('comment');
                $plan_commentstable->timestamps();
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
        Schema::dropIfExists('plan_comments'); //指定したテーブルがあれば削除して、なければ何もしない（エラーを返さない）というメソッド
    }
}
