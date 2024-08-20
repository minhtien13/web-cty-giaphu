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
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_create');
            $table->integer('user_id')->uniqid();
            $table->integer('is_role')->nullable();
            $table->string('info_email');
            $table->string('phone')->nullable();
            $table->string('date_register')->nullable();
            $table->string('date_login')->nullable();
            $table->string('date_active')->nullable();
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
};