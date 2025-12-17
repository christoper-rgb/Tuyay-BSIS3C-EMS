<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); // EmployeeID (PK)
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birthdate')->nullable();
            $table->string('contact_info')->nullable();
            $table->string('address')->nullable();
            $table->string('status')->default('Active');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('job_role_id')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');
            $table->foreign('job_role_id')->references('id')->on('job_roles')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
