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
        Schema::create('givens', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable() ;
            $table->double('value')->default(0) ;
            $table->date('date')->default(Carbon::now('Asia/Damascus')->format('Y-m-d')) ;
            $table->time('time')->default(Carbon::now('Asia/Damascus')->format('H:m:s')) ; 
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
        Schema::dropIfExists('givens');
    }
};
