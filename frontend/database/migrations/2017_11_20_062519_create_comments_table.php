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
            $table->ipAddress('ip')->nullable()->comment('IP');
            $table->unsignedInteger('replay_to')->default(0)->comment('回复评论的ID');
            $table->unsignedInteger('article_id')->comment('评论的文章ID');
            $table->text('content')->comment('评论内容');
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
        Schema::dropIfExists('comments');
    }
}
