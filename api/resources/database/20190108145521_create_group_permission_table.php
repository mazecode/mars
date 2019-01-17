<?php

use Phpmig\Migration\Migration;

class CreateGroupPermissionTable extends Migration
{
    public function up()
    {
        $this->schema->create('group_permissions', function(Illuminate\Database\Schema\Blueprint $table){
            $table->engine = 'InnoDB';	
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';	

            $table->increments('id');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('permission_id')->references('id')->on('permissions');
            $table->timestamps();
        });
    }

    // public function down()
    // {
    //     $this->dropTable('group_permissions');
    // }
}
