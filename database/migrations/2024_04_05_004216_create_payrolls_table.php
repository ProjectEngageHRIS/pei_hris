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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->string('employee_id');
            $table->bigIncrements('payroll_id');
            $table->string('phase', 20)->nullable();
            $table->string('month', 20)->default(now()->format('M'));
            $table->string('year', 8)->default(now()->format('Y'));
            $table->string('target_employee');
            $table->text('payroll_picture');
            $table->dateTime('deleted_at')->nullable();
            $table->foreign('employee_id')
                    ->references('employee_id')  // Assuming 'employee_id' is the primary key in the 'employees' table
                    ->on('employees')  // Specify the referenced table
                    ->onUpdate('cascade');  // Update related payrolls if the employee_id is updated
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
