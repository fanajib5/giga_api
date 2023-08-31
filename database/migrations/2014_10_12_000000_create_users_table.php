<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->char(column: 'id', length: 21)->primary();
            $table->string(column: 'first_name');
            $table->string(column: 'name')->nullable();
            $table->string(column: 'email')->unique();
            $table->timestamp(column: 'email_verified_at')->nullable();
            $table->timestamp(column: 'last_logged_in_at')->nullable();
            $table->timestamp(column: 'last_activity_at')->nullable();
            $table->string(column: 'password');
            $table->string(column: 'avatar')->nullable();
            $table->rememberToken()->nullable();
            $table->timestamp(column: 'created_at')->nullable();
            $table->char(column: 'created_by', length: 21)->nullable();
            $table->timestamp(column: 'updated_at')->nullable();
            $table->char(column: 'updated_by', length: 21)->nullable();
            $table->softDeletes();
            $table->char(column: 'deleted_by', length: 21)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};