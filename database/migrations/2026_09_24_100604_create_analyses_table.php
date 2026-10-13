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
    Schema::create('analyses', function (Blueprint $table) {
        $table->id();
        $table->foreignId('resume_id')->constrained()->cascadeOnDelete();
        $table->longText('job_description');
        $table->unsignedTinyInteger('ats_score')->nullable();
        $table->json('keyword_gaps')->nullable();
        $table->json('ai_suggestions')->nullable();
        $table->enum('status', ['pending', 'processing', 'completed', 'failed'])->default('pending');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analyses');
    }
};
