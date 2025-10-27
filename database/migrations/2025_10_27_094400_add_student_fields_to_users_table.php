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
        Schema::table('users', function (Blueprint $table) {
            $table->string('admission_number')->unique()->nullable()->after('name');
            $table->string('phone')->nullable()->after('email');
            $table->text('address')->nullable()->after('phone');
            $table->date('date_of_birth')->nullable()->after('address');
            $table->string('major')->nullable()->after('date_of_birth');
            $table->string('year_of_study')->nullable()->after('major');
            $table->enum('role', ['student', 'company', 'admin'])->default('student')->after('year_of_study');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['admission_number', 'phone', 'address', 'date_of_birth', 'major', 'year_of_study', 'role']);
        });
    }
};
