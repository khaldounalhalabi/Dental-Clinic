<?php

use Carbon\Carbon;
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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable() ;

            $table->UnsignedBigInteger('patient_id')->nullable();
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade') ; ;
            $table->date('date')->default(Carbon::now('Asia/Damascus')->format('y-m-d'))->nullable() ;
            $table->time('time')->default(Carbon::now('Asia/Damascus')->format('h:m:s'))->nullable() ;
            $table->text('description')->nullable() ;
            $table->text('prescription')->nullable() ;
            $table->text('procedure')->nullable() ;
            $table->double('cost')->default(0);

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
        Schema::dropIfExists('visits');
    }
};
