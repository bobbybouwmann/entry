<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntryTables extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table)
        {
            $table->integer('role_id')->unsigned();
        });

        Schema::create('roles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('permissions', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('permission_role', function (Blueprint $table) {
            $table->string('permission_name');
            $table->integer('role_id')->unsigned();

            $table->primary(['permission_name', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table)
        {
            $table->dropColumn('role_id');
        });

        Schema::drop('roles');
        Schema::drop('permissions');
        Schema::drop('permission_role');
    }

}