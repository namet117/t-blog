<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateFriendLinksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('friend_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 20)->comment('名称');
            $table->string('link')->comment('链接');
            $table->tinyInteger('ordering')->default(0)->comment('排序');
            $table->tinyInteger('enabled')->default(1)->comment('是否启用');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('friend_links');
    }
}
