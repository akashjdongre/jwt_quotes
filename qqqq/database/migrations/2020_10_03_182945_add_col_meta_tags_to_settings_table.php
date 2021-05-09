<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColMetaTagsToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('meta_title')->after('default_image')->nullable();
            $table->string('meta_author')->after('meta_title')->nullable();
            $table->string('meta_desc')->after('meta_author')->nullable();
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
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['meta_title','meta_author','meta_desc','meta_keywords','url']);
        });
    }
}
