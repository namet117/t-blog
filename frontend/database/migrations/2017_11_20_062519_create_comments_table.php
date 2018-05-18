<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->string('username')->nullable()->comment('用户名');
            $table->string('site', 100)->comment('站点')->nullable();
            $table->string('email', 100)->comment('邮箱')->nullable();
            $table->ipAddress('ip')->nullable()->comment('IP');
            $table->unsignedInteger('reply_to')->default(0)->comment('回复评论的ID');
            $table->unsignedInteger('article_id')->index()->comment('评论的文章ID');
            $table->text('original_md')->comment('原始MarkDown');
            $table->text('content')->comment('评论内容');
            $table->integer('rank')->index()->default(1)->comment('评论楼层');
            $table->tinyInteger('notification')->default(1)->comment('是否接收新消息通知');
            $table->tinyInteger('is_notified')->default(0)->comment('是否已发送通知');
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
        Schema::dropIfExists('comments');
    }
}
