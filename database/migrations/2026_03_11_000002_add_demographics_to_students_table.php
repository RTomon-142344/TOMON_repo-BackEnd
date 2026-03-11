<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('gender')->default('Male')->after('email');
            $table->string('department')->default('BSIT')->after('gender');
            $table->date('enrolled_at')->nullable()->after('department'); // enrollment date for monthly trend
        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['gender', 'department', 'enrolled_at']);
        });
    }
};