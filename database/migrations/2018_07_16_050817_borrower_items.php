<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BorrowerItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('borrower_details', function (Blueprint $table) {
            $table->increments('details_id');
            $table->integer('borrower_id');
            $table->string('sn#');
            $table->string('item');
            $table->integer('qty');
            $table->string('status');
            $table->string('date_borrowed');
            $table->string('returned_date')->nullable();
            $table->string('released_by');
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
        //
    }
}
