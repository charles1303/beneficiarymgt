<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiaryFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiary_files', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('beneficiary_id')->unsigned();
            $table->foreign('beneficiary_id')->references('id')->on('beneficiaries');
            $table->string('filename');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('beneficiary_files');
    }
}
