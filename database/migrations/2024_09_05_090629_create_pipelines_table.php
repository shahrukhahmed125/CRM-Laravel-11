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
        Schema::create('pipelines', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the pipeline stage
            $table->string('description')->nullable(); // Description of the pipeline stage (optional)
            $table->integer('position')->default(0); // Position of the stage in the pipeline (e.g., 1, 2, 3...)
            $table->timestamps(); // created_at and updated_at columns
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pipelines');
    }
};
