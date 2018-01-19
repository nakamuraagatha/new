<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaporanreskrimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporanreskrim', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_laporan');
            $table->text('judul_laporan');
            $table->date('tgl_laporan');
            $table->string('file');
            $table->enum('status', ['Aktif', 'Non Aktif'])->default('Aktif');
            $table->timestamps();
        });
        
        Schema::table('laporanreskrim', function ($table) { 
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users'); 
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('laporanreskrim');
    }
}
