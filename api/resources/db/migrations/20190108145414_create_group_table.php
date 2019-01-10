<?php


use Phinx\Migration\AbstractMigration;

class CreateGroupTable extends AbstractMigration
{
    public function up()
    {
        $this->schema->create('groups', function(Illuminate\Database\Schema\Blueprint $table){
            $table->engine = 'InnoDB';	
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';	

            $table->increments('id');
            $table->string('name')->comment('Group\'s name');
            $table->timestamps();
        });
    }

    public function down()
    {
        $this->dropTable('groups');
    }
}
