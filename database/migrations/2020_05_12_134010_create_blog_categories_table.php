<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_categories', function (Blueprint $table) {

            $table->id();
            $table->integer('parent_id')->unsigned()->default(1);

            $table->string('slug', 100)->unique();
            $table->string('title', 100);
            $table->text('description')->nullable();

            $table->timestamp('gos')->nullable();
            $table->timestamps(0);
            $table->softDeletes('deleted_at', 0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_categories');
    }
}
