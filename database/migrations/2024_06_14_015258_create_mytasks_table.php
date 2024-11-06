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
        Schema::create('mytasks', function (Blueprint $table) {
            $table->bigIncrements('form_id');
            $table->uuid('uuid')->unique();
            $table->string('employee_id');
            $table->dateTime('application_date');
            $table->string('status');
            $table->json('target_employees');
            $table->string('task_title', 3000)->nullable();
            $table->text('assigned_task');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->dateTime('cancelled_at')->nullable();
            // Add foreign key for employee_id
            $table->foreign('employee_id')
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
        Schema::dropIfExists('mytasks');
    }
};
