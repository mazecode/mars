<?php

use Illuminate\Database\Schema\Blueprint;
// use Phinx\Migration\AbstractMigration;

class CreateUserGroupsTable extends BaseMigration
{

    public function up()
    {
        $this->schema->create('user_groups', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('group_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->timestamps();
            $table->softDeletes();
        });
    }
    
    public function down()
    {
        $this->schema->dropIfExists('user_groups');
    }

}
