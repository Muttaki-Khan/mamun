<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalarySheetTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('salary_sheet', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('payment_date');
            $table->string('month', 50);
            $table->unsignedBigInteger('employee_id');
            $table->double('amount', 15, 5);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('salary_sheet');
    }
}
