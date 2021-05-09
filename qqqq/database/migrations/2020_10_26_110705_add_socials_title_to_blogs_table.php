<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSocialsTitleToBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('title')->after('meta_image')->nullable();
            $table->bigInteger('likes')->after('image')->default(0);
            $table->bigInteger('facebook')->after('likes')->default(0);
            $table->bigInteger('twitter')->after('facebook')->default(0);
            $table->bigInteger('instagram')->after('twitter')->default(0);
            $table->bigInteger('linkedin')->after('instagram')->default(0);
            $table->bigInteger('whatsapp')->after('linkedin')->default(0);
            $table->bigInteger('pinterest')->after('whatsapp')->default(0);
            $table->bigInteger('total_share')->after('pinterest')->default(0);
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
            $table->dropColumn(['title','likes','facebook','twitter','instagram','linkedin','whatsapp','pinterest','total_share']);
        });
    }
}
