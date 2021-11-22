<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //upメソッドは新しいテーブル、カラム、インデックスをデータベースへ追加するために使用
    {

        if (!Schema::hasTable('question_categories')) { //ブログのテーブルが無かったら作る
            Schema::create('question_categories', function (Blueprint $question_categoriestable) {
            $question_categoriestable->Increments('id'); //勝手に採番される
            $question_categoriestable->string('category_name');
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
        Schema::dropIfExists('question_categories'); //指定したテーブルがあれば削除して、なければ何もしない（エラーを返さない）というメソッド
    }
}
