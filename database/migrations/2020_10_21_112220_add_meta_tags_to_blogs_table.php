<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMetaTagsToBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->text('meta_title')->after('custom_id')->nullable();
            $table->text('meta_author')->after('meta_title')->nullable();
            $table->text('meta_desc')->after('meta_author')->nullable();
            $table->text('meta_keywords')->after('meta_desc')->nullable();
            $table->string('url')->after('meta_keywords')->nullable();
            $table->string('meta_image')->after('url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['meta_title','meta_author','meta_desc','meta_keywords','url','meta_image']);
        });
    }
}
