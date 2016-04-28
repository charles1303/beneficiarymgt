<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CaseUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
            Schema::create('case_updates', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('case_id')->unsigned();
                $table->integer('updated_by')->unsigned();
                $table->date('entry_date');
                $table->longText('comment');

                $table->timestamps();

            });

            Schema::table('case_updates', function ($table) {
                $table->foreign('updated_by')->references('id')->on('users');
                $table->foreign('case_id')->references('id')->on('beneficiary_case');
            });
        }
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
