<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable(); 
            $table->unsignedBigInteger('sub_category_id')->nullable(); 
            $table->unsignedBigInteger('popular_topic_id')->nullable(); 
            $table->string('video')->nullable();
            $table->string('video_course_name')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->longText('description')->nullable();
            $table->string('author')->nullable();
            $table->string('perview')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('set null');
            $table->foreign('popular_topic_id')->references('id')->on('popular_topics')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
