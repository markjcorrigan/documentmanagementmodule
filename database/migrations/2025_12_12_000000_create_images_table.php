<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('shortname', 255);
            $table->longText('description')->nullable();
            $table->string('path');
            $table->string('extension', 10)->nullable()->comment('File extension like jpg, pdf, mp4'); // NEW COLUMN
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('images');
    }
}
