<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickname', 20)->comment('用户名');
            $table->string('site', 100)->comment('站点')->nullable();
            $table->text('content')->comment('内容');
            $table->ipAddress('ip')->comment('IP地址');
            $table->string('ip_location')->comment('IP地理位置')->nullable();
            //默认值都会被当作字符串，还需要适配MySQL5.7的数据类型检查
            // $table->tinyInteger('is_new', 1)->nullable()->comment('是否为新消息');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
