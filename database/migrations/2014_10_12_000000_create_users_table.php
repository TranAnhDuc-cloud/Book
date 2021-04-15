<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firt_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('profile_pic')->nullable();
            $table->integer('is_staff');
            $table->integer('is_active');
            $table->date('data_joined');
            $table->integer('is_superuser');
            $table->string('username');
            $table->string('password');
            $table->string('address')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
