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
        Schema::create('payroll_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id', 10);
            $table->string('target_employee', 10);
            $table->string('phase', 10);
            // $table->string('payroll_id', 20);
            $table->string('status', 50);
            $table->string('month', 20)->default(now()->format('M'));
            $table->string('year', 8)->default(now()->format('Y'));
            $table->dateTime('deleted_at')->nullable();
            $table->foreign('employee_id')
                ->references('employee_id')
                ->on('employees')
                ->onUpdate('cascade');  // Ensures employee_id is updated in payroll_statuses if the employee_id changes in employees
        
            $table->foreign('target_employee')
                ->references('employee_id')
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
        Schema::dropIfExists('payroll_statuses');
    }
};
