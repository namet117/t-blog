<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->string('title', 255)->comment('标题');
            $table->string('keywords', 255)->comment('关键字');
            $table->text('abstract')->comment('摘要')->nullable();
            $table->text('original_md')->comment('原始的MarkDown内容');
            $table->text('content')->comment('解析后的HTML内容');
            $table->string('tag_ids', 200)->comment('标签');
            $table->string('slug')->comment('标题翻译')->nullable();
            $table->string('first_img', 200)->comment('首图')->nullable();
            $table->integer('view_times')->default(0)->comment('浏览次数');
            $table->integer('praise_times')->default(0)->comment('被赞次数');
            $table->integer('comment_times')->default(0)->comment('评论次数');
            $table->tinyInteger('is_top')->default(0)->comment('是否置顶');
            $table->tinyInteger('is_hidden')->default(0)->comment('是否隐藏');
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
        Schema::dropIfExists('articles');
    }
}
