<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('quote_id')->nullable();
            $table->bigInteger('likes')->default(0);
            $table->bigInteger('facebook')->default(0);
            $table->bigInteger('twitter')->default(0);
            $table->bigInteger('instagram')->default(0);
            $table->bigInteger('linkedin')->default(0);
            $table->bigInteger('whatsapp')->default(0);
            $table->bigInteger('pinterest')->default(0);
            $table->bigInteger('total_share')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('socials');
    }
}
