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
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mobile');

            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')
                  ->references('id')
                  ->on('states')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')
                  ->references('id')
                  ->on('countries')
                  ->onDelete('cascade');
                  
            $table->unsignedBigInteger('education_id');
            $table->foreign('education_id')
                  ->references('id')
                  ->on('education')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('specialization_id');
            $table->foreign('specialization_id')
                  ->references('id')
                  ->on('states')
                  ->onDelete('specializations');
            
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')
                  ->references('id')
                  ->on('user_roles')
                  ->onDelete('cascade');

                  
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
