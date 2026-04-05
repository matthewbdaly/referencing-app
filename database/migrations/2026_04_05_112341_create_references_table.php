<?php

use App\ReferenceType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('references', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default(ReferenceType::WebPage);
            $table->string('title')->nullable();
            $table->string('date')->nullable();
            $table->string('url')->nullable();
            $table->string('author')->nullable();
            $table->string('publication')->nullable();
            $table->string('publisher')->nullable();
            $table->string('volume')->nullable();
            $table->string('issue')->nullable();
            $table->string('doi')->nullable();
            $table->timestamp('accessed_at')->useCurrent();
            $table->foreignId('project_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('references');
    }
};
