<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            $table->UnsignedBigInteger('patient_id')->nullable();
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->string('first_name') ;
            $table->string('last_name') ;
            $table->date('date') ;
            $table->time('time')->nullable() ;
            $table->string('phone_number')->nullable() ;
            $table->string('home_number')->nullable() ;
            $table->string('reason')->nullable() ;
            $table->text('notes')->nullable() ;
            $table->string('status')->default('waiting') ;
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
        Schema::dropIfExists('reservations');
    }
};
