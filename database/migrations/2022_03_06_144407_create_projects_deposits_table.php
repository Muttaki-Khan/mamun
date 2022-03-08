<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsDepositsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('projects_deposits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('deposite_date');
            $table->string('deposite_by', 50);
            $table->unsignedBigInteger('tender_id');
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
        Schema::dropIfExists('projects_deposits');
    }
}
