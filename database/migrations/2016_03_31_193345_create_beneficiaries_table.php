<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('beneficiary_num')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->date('date_of_birth');
            $table->string('sex');
            $table->string('marital_status');
            $table->string('phone_number');
            $table->string('address');
            $table->string('state_of_origin');
            $table->string('employment_status');
            $table->string('occupation');
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
        Schema::drop('beneficiaries');
    }
}
