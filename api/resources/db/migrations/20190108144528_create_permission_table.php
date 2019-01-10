<?php


use Phinx\Migration\AbstractMigration;

class CreatePermissionTable extends AbstractMigration
{
    public function up()
    {
        $this->schema->create('permissions', function(Illuminate\Database\Schema\Blueprint $table){
            $table->engine = 'InnoDB';	
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';	

            $table->increments('id');
            $table->string('name')->comment('Permission\'s name');
            $table->integer('content_type_id');
            $table->string('codename')->comment('Code\'s name');
            $table->boolean('active')->comment('Is active?');
            // Required for Eloquent's created_at and updated_at columns 
            $table->timestamps();
        });
    }

    public function down()
    {
        $this->dropTable('permissions');
    }
}
