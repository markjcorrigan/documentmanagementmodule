<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('shortname', 255)->unique();
            $table->longText('description')->nullable();
            $table->string('path');
            $table->string('folder')->default('pending');
            $table->string('extension', 10)->nullable()->comment('File extension like jpg, pdf, mp4');
            $table->timestamps();
            $table->softDeletes(); // ADDED for soft delete functionality
            
            // ADDED indexes for performance
            $table->index('shortname');
            $table->index('extension');
        });
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
}