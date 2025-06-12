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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id')->nullable()->contrained()->cascadeOnDelete();
            $table->unsignedBigInteger('faculty_id')->nullable()->contrained()->cascadeOnDelete();
            $table->unsignedBigInteger('purpose_id')->nullable()->contrained()->cascadeOnDelete();
            $table->string('name')->nullable()->contrained()->cascadeOnDelete();
            $table->string('stdnt_id')->nullable()->contrained()->cascadeOnDelete();
            $table->string('date')->nullable()->contrained()->cascadeOnDelete();
            $table->string('time')->nullable()->contrained()->cascadeOnDelete();
            $table->timestamps();
        
            // Foreign key constraints
            $table->foreign('department_id')->references('id')->on('departments')->nullable()->contrained()->cascadeOnDelete();
            $table->foreign('faculty_id')->references('id')->on('faculties')->nullable()->contrained()->cascadeOnDelete();
            $table->foreign('purpose_id')->references('id')->on('purposes')->nullable()->contrained()->cascadeOnDelete();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
