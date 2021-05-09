<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMetaTagsToAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('authors', function (Blueprint $table) {
            $table->string('meta_title')->after('name')->nullable();
            $table->string('meta_author')->after('meta_title')->nullable();
            $table->text('meta_desc')->after('meta_author')->nullable();
            $table->string('meta_keywords')->after('meta_desc')->nullable();
            $table->string('url')->after('meta_keywords')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('authors', function (Blueprint $table) {
            $table->dropColumn(['meta_title','meta_author','meta_desc','meta_keywords','url']);
        });
    }
}
