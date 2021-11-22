<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //upメソッドは新しいテーブル、カラム、インデックスをデータベースへ追加するために使用
    {

        if (!Schema::hasTable('questions')) { //ブログのテーブルが無かったら作る
            Schema::create('questions', function (Blueprint $questionstable) {
            $questionstable->Increments('id'); //勝手に採番される
            $questionstable->foreignId('user_id');
            $questionstable->foreignId('category_id');
            $questionstable->text('text');
            $questionstable->timestamps();
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
        Schema::dropIfExists('questions'); //指定したテーブルがあれば削除して、なければ何もしない（エラーを返さない）というメソッド
    }
}