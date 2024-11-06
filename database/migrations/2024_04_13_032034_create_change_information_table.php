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
        Schema::create('change_information', function (Blueprint $table) {
            $table->bigIncrements('form_id');
            $table->uuid('uuid')->unique();
            $table->dateTime('application_date');
            $table->string('employee_id');
            $table->string('status');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('gender')->default('Would Rather Not say');
            $table->string('religion')->nullable();
            $table->string('nickname', 20)->nullable();
            $table->string('civil_status', 20)->nullable();
            $table->string('phone');
            $table->text('address');
            $table->json('employee_history')->nullable();
            $table->text('profile_summary')->nullable();
            $table->dateTime('cancelled_at')->nullable();
            $table->string('emp_image')->nullable();
            // Add foreign key constraint for employee_id
            $table->foreign('employee_id')
                ->references('employee_id')  // Reference the employee_id in the employees table
                ->on('employees')  // Specify that the reference is to the employees table
                ->onUpdate('cascade');  // Update related records if the employee_id is updated
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('change_information');
    }
};
