<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->enum('level', ['beginner', 'elementary', 'pre_intermediate', 'intermediate', 'upper_intermediate', 'advanced']);
            $table->integer('duration_weeks');
            $table->decimal('price', 8, 2);
            $table->integer('max_students')->default(10);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('schedule'); 
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
