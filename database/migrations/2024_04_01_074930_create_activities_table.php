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
        Schema::create('employee_activities', function (Blueprint $table) {
            // $table->id();
            $table->string('activity_id')->primary();
            $table->string('status')->default('Active');
            $table->dateTime('published_date')->default(now());
            $table->string('type');
            $table->string('subject');
            $table->longText('description');
            $table->string('poster')->nullable();
            $table->date('date');
            $table->time('start');
            $table->time('end');
            $table->string('publisher');
            $table->boolean('is_featured');
            $table->json('visible_to_list');
            $table->dateTime('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_activities');
    }
};
