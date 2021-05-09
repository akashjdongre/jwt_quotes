<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAnotherColInQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->string('gif')->after('image')->nullable();
            $table->string('video')->after('gif')->nullable();
            $table->text('video_title')->after('video')->nullable();
            $table->text('video_desc')->after('video_title')->nullable();
            $table->string('video_thumb')->after('video_desc')->nullable();
            $table->string('meta_title')->after('author')->nullable();
            $table->string('meta_author')->after('meta_title')->nullable();
            $table->text('meta_desc')->after('meta_author')->nullable();
            $table->string('meta_keywords')->after('meta_desc')->nullable();
            $table->string('meta_image')->after('meta_keywords')->nullable();
            $table->string('url')->after('meta_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->dropColumn(['gif','video','video_title','video_desc','video_thumb','meta_title',
                'meta_author','meta_desc','meta_keywords','meta_image','url']);
        });
    }
}
