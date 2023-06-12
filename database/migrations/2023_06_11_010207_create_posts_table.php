<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
	    $table->id();
            $table->integer('category_id');
            $table->string('slug');
            $table->string('title');
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1=publish, 0=draft');
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
        Schema::dropIfExists('posts');
    }
};
