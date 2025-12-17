<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('system_admins', function (Blueprint $table) {
            $table->id(); // AdminID (PK)
            $table->string('username')->unique();
            $table->string('password_hash');
            $table->string('full_name');
            $table->string('role');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('system_admins');
    }
};
