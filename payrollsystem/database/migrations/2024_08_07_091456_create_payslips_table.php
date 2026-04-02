<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payslips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('payrun_id')->nullable();
            $table->foreign('payrun_id')->references('id')->on('payruns')->onUpdate('cascade')->onDelete('cascade');
            $table->string('payrun_period');
            $table->string('payrun_type');
            $table->string('status');
            $table->string('total_salary');
            $table->string('net_salary');
            $table->string('condition');
            $table->string('sss');
            $table->string('pagibig');
            $table->string('philhealth');
            $table->string('tax_income');
            $table->string('month_range');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payslips');
    }
};
