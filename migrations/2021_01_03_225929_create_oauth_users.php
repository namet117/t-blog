<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateOauthUsers extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('oauth_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->comment('用户id');
            $table->string('oauth_name', 20)->comment('认证服务器名称');
            $table->string('uid', 50)->comment('唯一id')->unique();
            $table->string('uname', 50)->comment('昵称');
            $table->string('avatar', 200)->comment('头像url');
            $table->string('access_token', 100)->comment('Access_token');
            $table->integer('expire_time')->comment('access_token过期时间');
            $table->string('refresh_token', 100)->comment('刷新token')->nullable();
            $table->text('extends')->comment('扩展信息json化')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oauth_users');
    }
}
