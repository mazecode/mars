<?php

use Illuminate\Database\Schema\Blueprint;

class CreateGroupPermissionTable extends BaseMigration
{
    public function up()
    {
        $this->schema->create('group_permissions', function(Blueprint $table){
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
