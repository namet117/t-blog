<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->string('username', 50)->comment('用户名')->unique();
            $table->string('email', 100)->comment('邮箱')->default('')->unique();
            $table->string('telephone', 20)->comment('手机号')->default('')->unique();
            $table->string('avatar', 100)->comment('头像')->default('');
            $table->rememberToken();
            // TODO delete
            $table->string('api_token')->comment('API TOKEN')->default('');
            $table->tinyInteger('is_admin')->comment('是否管理员')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
