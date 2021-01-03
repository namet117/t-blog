<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateComments extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->nullable()->comment('用户名');
            $table->integer('user_id')->index()->comment('用户ID');
            $table->ipAddress('ip')->nullable()->comment('IP');
            $table->unsignedInteger('reply_to')->default(0)->comment('回复评论的ID');
            $table->unsignedInteger('article_id')->index()->comment('评论的文章ID');
            $table->text('original_md')->comment('原始MarkDown');
            $table->text('content')->comment('评论内容');
            $table->integer('rank')->index()->default(1)->comment('评论楼层');
            $table->tinyInteger('notification')->default(1)->comment('是否接收新消息通知');
            $table->tinyInteger('is_notified')->default(0)->comment('是否已发送通知');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
}
