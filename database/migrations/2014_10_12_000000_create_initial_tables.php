<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('email')->unique();
            $table->json('details')->nullable();
            $table->string('api_key');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('providers', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('name')->unique();
            $table->json('details')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('provider_user', function (Blueprint $table) {
            $table->uuid('provider_id')->unsigned();
            $table->foreign('provider_id')->references('id')->on('providers');
            $table->uuid('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->primary(['user_id', 'provider_id']);
            $table->json('provider_options')->nullable();
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
        Schema::drop('user_providers');
        Schema::drop('users');
        Schema::drop('providers');
    }
}
