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
        Schema::create('hrtickets', function (Blueprint $table) {
            $table->bigIncrements('form_id');
            $table->uuid('uuid')->unique();
            $table->string('employee_id');
            // $table->string('reference_num')->primary();
            $table->string('status', 20);
            $table->date('application_date')->default(now());
            $table->string('concerned_employee', 500);
            $table->string('type_of_ticket', 50);
            $table->string('type_of_request', 50);  
            $table->string('sub_type_of_request', 50)->nullable();
            $table->string('type_of_pe_hr_ops', 50)->nullable();
            $table->string('account_client_hr_ops', 50)->nullable();
            $table->string('request_requested', 500)->nullable();
            $table->string('purpose')->nullable();
            $table->string('type_of_hrconcern')->nullable();
            $table->string('condition_availability')->nullable();
            $table->string('request_extra', 255)->nullable();
            $table->string('request_assigned', 255)->nullable();
            $table->text('request_link')->nullable();
            $table->date('request_date')->nullable();
            $table->json('request_others')->nullable();
            $table->dateTime('cancelled_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hrtickets');
    }
};
