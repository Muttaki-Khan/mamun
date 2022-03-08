<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficeExpensesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('office_expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('expense_date');
            $table->string('expense_reason', 191);
            $table->string('debit_by', 50);
            $table->double('amount', 15, 5);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('tender_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('office_expenses');
    }
}
