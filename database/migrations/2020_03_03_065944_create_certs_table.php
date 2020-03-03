<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cert_num', 20);
            $table->string('name', 200);
            $table->date('date_birth');
            $table->string('ic_ibu', 15)->nullable();
            $table->string('ic_bapa', 15)->nullable();
            $table->foreign('ic_ibu')->references('ic_number')->on('users')->onDelete('cascade');
            $table->foreign('ic_bapa')->references('ic_number')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('certs');
    }
}
