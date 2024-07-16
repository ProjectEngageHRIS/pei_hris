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
            $table->string('month', 20)->default(now()->format('M'));
            $table->string('year', 8)->default(now()->format('Y'));
            $table->date('start_date');
            $table->date('end_date');
            $table->string('target_employee');
            $table->string('payroll_picture');
            // $table->decimal('basic_pay', 10, 2);
            // $table->decimal('tardiness', 10, 2);
            // $table->integer('absences');
            // $table->decimal('cell_allowance', 10, 2);
            // $table->decimal('de_minimis_allowance', 10, 2);
            // $table->decimal('rice_subsidy_allowance', 10, 2);
            // $table->decimal('laundry_allowance', 10, 2);
            // $table->decimal('clothing_allowance', 10, 2);
            // $table->decimal('medical_cash_allowance', 10, 2);
            // $table->decimal('other_allowance', 10, 2);
            // $table->decimal('overtime', 10, 2);
            // $table->decimal('other_adjustments', 10, 2);
            // $table->decimal('birthday_gift', 10, 2);
            // $table->decimal('sss_premium', 10, 2);
            // $table->decimal('philhealth_premium', 10, 2);
            // $table->decimal('hdmf_premium', 10, 2);
            // $table->decimal('withholding_tax', 10, 2);
            // $table->decimal('co_loan', 10, 2);
            // $table->decimal('sss_loan', 10, 2);
            // $table->decimal('hdmf_loan', 10, 2);
            // $table->decimal('hdmf_savings', 10, 2);
            // $table->decimal('hmo', 10, 2);
            // $table->decimal('laptop_program', 10, 2);
            // $table->decimal('gross_pay', 10, 2);
            // $table->decimal('gross_deed', 10, 2);
            // $table->decimal('net_pay', 10, 2);
            // $table->decimal('php', 10, 2);


            // Not needed
            // $table->date('date');
            // $table->decimal('salary');
            // $table->decimal('balance', 10, 2)->nullable();
            // $table->decimal('loan_balance', 10, 2)->nullable();
            // $table->decimal('lvt_pay', 10, 2)->nullable();
            // $table->decimal('pera', 10, 2)->nullable();
            // $table->decimal('absences', 10, 2)->nullable();
            // $table->decimal('amount_earned', 10, 2)->nullable();
            // $table->decimal('gsis_deduction', 10, 2)->nullable();
            // $table->decimal('wtax', 10, 2)->nullable();
            // $table->decimal('philhealth', 10, 2)->nullable();
            // $table->decimal('pag_ibig', 10, 2)->nullable();
            // $table->decimal('plmpcci', 10, 2)->nullable();
            // $table->decimal('landbank', 10, 2)->nullable();
            // $table->decimal('maxicare', 10, 2)->nullable();
            // $table->decimal('study_grant', 10, 2)->nullable();
            // $table->decimal('other_deductions', 10, 2)->nullable();
            // $table->decimal('net_pay', 10, 2)->nullable();
            $table->dateTime('deleted_at')->nullable();
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
