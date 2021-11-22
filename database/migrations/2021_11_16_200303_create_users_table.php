<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (!Schema::hasTable('users')) { //ブログのテーブルが無かったら作る
            Schema::create('users', function (Blueprint $userstable) {
                $userstable->Increments('id'); //勝手に採番される
                $userstable->string('user_name')->unique();
                $userstable->string('email')->unique();
                $userstable->string('password');
                $userstable->rememberToken()->nullable(); // nullを許容したい時
                $userstable->timestamps();
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
        Schema::dropIfExists('users'); //指定したテーブルがあれば削除して、なければ何もしない（エラーを返さない）というメソッド
    }
}