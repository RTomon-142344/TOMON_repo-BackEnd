<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('school_days', function (Blueprint $table) {
            $table->id();
            $table->date('date')->unique();
            $table->string('type')->default('class'); // class, holiday, event
            $table->string('label')->nullable();       // e.g. "Christmas Break", "Foundation Day"
            $table->integer('attendance_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('school_days');
    }
};