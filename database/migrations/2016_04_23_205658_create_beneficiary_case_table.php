<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiaryCaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiary_case', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('beneficiary_id')->unsigned();
            $table->integer('case_officer_id')->unsigned();
            $table->integer('back_up_case_officer_id')->unsigned();
            $table->date('entry_date');
            $table->longText('comment');
            $table->decimal('amount_released',12,2)->default(0.00);
            $table->decimal('amount_requested',12,2)->default(0.00);
            $table->string('case_status');
            $table->string('case_num')->unique();
            $table->bigInteger('case_type_id')->unsigned();
            $table->timestamps();

        });

        Schema::table('beneficiary_case', function ($table) {
            $table->foreign('beneficiary_id')->references('id')->on('beneficiaries');
            $table->foreign('case_officer_id')->references('id')->on('users');
            $table->foreign('back_up_case_officer_id')->references('id')->on('users');
            $table->foreign('case_type_id')->references('id')->on('case_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
