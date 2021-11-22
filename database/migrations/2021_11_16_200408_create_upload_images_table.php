<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //upメソッドは新しいテーブル、カラム、インデックスをデータベースへ追加するために使用
    {

        if (!Schema::hasTable('upload_images')) { //ブログのテーブルが無かったら作る
            Schema::create('upload_images', function (Blueprint $upload_imagestable) {
            $upload_imagestable->Increments('id'); //勝手に採番される
            $upload_imagestable->foreignId('farm_id');
            $upload_imagestable->string('file_name');
            $upload_imagestable->string('file_path');
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
        Schema::dropIfExists('upload_images'); //指定したテーブルがあれば削除して、なければ何もしない（エラーを返さない）というメソッド
    }
}
