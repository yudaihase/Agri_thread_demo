<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //upメソッドは新しいテーブル、カラム、インデックスをデータベースへ追加するために使用
    {

        if (!Schema::hasTable('answers')) { //ブログのテーブルが無かったら作る
            Schema::create('answers', function (Blueprint $answerstable) {
            $answerstable->Increments('id'); //勝手に採番される
            $answerstable->foreignId('user_id');
            $answerstable->foreignId('question_id');
            $answerstable->text('answer');
            $answerstable->timestamps();
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
        Schema::dropIfExists('answers'); //指定したテーブルがあれば削除して、なければ何もしない（エラーを返さない）というメソッド
    }
}
