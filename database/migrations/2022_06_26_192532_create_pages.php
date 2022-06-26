<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('slug');
            $table->string('op_bg_color')->default('#000000');
            $table->string('op_bg_type')->default('color');
            $table->string('op_bg_value')->default('#ffffff');
            $table->string('op_profile_image')->default('default.jpg');
            $table->string('op_title')->nullable();
            $table->string('op_description')->nullable();
            $table->string('op_fb_pixel')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
