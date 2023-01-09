<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserNomineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_nominees', function (Blueprint $table) {
            $table->uuid('id')->primary()->index();
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->uuid('nominee_to');
            $table->foreign('nominee_to')->references('id')->on('users')->onDelete('cascade');
            $table->integer('nominee_type')->comment('1->father/mother,2->son/daughter,3->brother/sister,4->wife/husband,5->friend');
            $table->softDeletes();
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
        Schema::dropIfExists('user_nominees');
    }
}
