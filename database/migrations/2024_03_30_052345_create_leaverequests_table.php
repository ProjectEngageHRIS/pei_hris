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
        Schema::create('leaverequests', function (Blueprint $table) {
            $table->bigIncrements('form_id'); // Primary key
            $table->uuid('uuid')->unique(); // Unique UUID
            $table->string('employee_id'); // Foreign key referencing employees table
            $table->string('status')->default('reviewing');
            $table->string('supervisor_email', 100)->nullable();
            $table->date('application_date')->default(now());
            $table->string('mode_of_application', 20)->nullable();
            $table->datetime('inclusive_start_date')->nullable();
            $table->datetime('inclusive_end_date')->nullable();
            $table->string('full_or_half', 20)->nullable();
            $table->string('deduct_to', 20)->nullable();
            $table->decimal('num_of_days_work_days_applied')->nullable();
            $table->date('date_earned')->nullable();
            $table->text('earned_description')->nullable();
            $table->text('purpose_type')->nullable();
            $table->text('reason');
            $table->boolean('approved_by_supervisor')->nullable();
            $table->boolean('approved_by_president')->nullable();
            $table->dateTime('cancelled_at')->nullable();
            
            // Make sure employee_id is the same type as it is in the employees table
            $table->foreign('employee_id')
                  ->references('employee_id') // Reference to employees table's employee_id
                  ->on('employees')
                  ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaverequests');
    }
};
