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
            $table->unsignedInteger('replay_to')->default(0)->comment('回复评论的ID');
            $table->unsignedInteger('article_id')->comment('评论的文章ID');
            $table->text('origin_md')->comment('原始MarkDown');
            $table->text('content')->comment('评论内容');
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
