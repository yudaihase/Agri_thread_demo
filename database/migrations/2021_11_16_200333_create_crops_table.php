<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCropsTable extends Migration
{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() //upメソッドは新しいテーブル、カラム、インデックスをデータベースへ追加するために使用
        {
    
            if (!Schema::hasTable('crops')) { //ブログのテーブルが無かったら作る
                Schema::create('crops', function (Blueprint $cropstable) {
                $cropstable->Increments('id'); //勝手に採番される
                $cropstable->foreignId('farm_id');
                $cropstable->string('crop');
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
            Schema::dropIfExists('crops'); //指定したテーブルがあれば削除して、なければ何もしない（エラーを返さない）というメソッド
        }
    }