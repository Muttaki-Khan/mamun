<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersPaymentTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('suppliers_payment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('payment_date');
            $table->unsignedBigInteger('suppliers_id');
            $table->double('payment_amount', 15, 5);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('suppliers_payment');
    }
}
