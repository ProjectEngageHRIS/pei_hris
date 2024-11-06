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
        Schema::create('dailytimerecords', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->date('attendance_date')->default(now());
            $table->string('type', 50)->nullable();
            $table->dateTime('time_in')->nullable();
            $table->dateTime('time_out')->nullable();
            $table->boolean('late')->nullable();
            $table->decimal('overtime', 8, 2)->nullable();
            $table->decimal('undertime', 8, 2)->nullable();
            $table->string('time_in_location')->nullable();
            $table->string('time_out_location')->nullable();
            $table->foreign('employee_id')
                ->references('employee_id')
                ->on('employees')
                ->onUpdate('cascade'); // This allows updates to cascade
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dailytimerecords');
    }
};
