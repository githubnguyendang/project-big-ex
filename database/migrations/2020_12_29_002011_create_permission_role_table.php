<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_role', function (Blueprint $table) {
            $table->increments('permission_role_id');

            $table->Integer('id_role')->unsigned();
            $table->foreign('id_role')
                ->references('role_id')
                ->on('roles')
                ->onDelete('cascade');

            $table->Integer('id_per')->unsigned();
            $table->foreign('id_per')
                ->references('per_id')
                ->on('permission')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permission_role', function (Blueprint $table) {
            //
        });
    }
}
