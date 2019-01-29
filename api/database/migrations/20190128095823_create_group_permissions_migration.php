<?php

use Illuminate\Database\Schema\Blueprint;
// use Phinx\Migration\AbstractMigration;

class CreateGroupPermissionsMigration extends BaseMigration
{

    public function up()
    {
        $this->schema->create('group_permissions', function(Blueprint $table){
            $table->increments('id');
            $table->integer('group_id');
            $table->integer('permission_id');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('permission_id')->references('id')->on('permissions');
            $table->timestamps();
            $table->softDeletes();
        });
    }
    
    public function down()
    {
        $this->schema->dropIfExists('group_permissions');
    }

}
