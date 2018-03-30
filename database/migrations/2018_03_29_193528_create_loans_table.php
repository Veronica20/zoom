<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('currency');
            $table->string('money');
            $table->string('county');
            $table->string('name')->nullable();;
            $table->string('surname')->nullable();;
            $table->string('sex')->nullable();;
            $table->dateTime('DOB')->nullable();
            $table->string('address')->nullable();;
            $table->integer('family_count')->nullable();;
            $table->string('identity_type')->nullable();;
            $table->string('identity_number')->nullable();;
            $table->string('given_date')->nullable();;
            $table->string('given_person')->nullable();;
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
        Schema::dropIfExists('loans');
    }
}
