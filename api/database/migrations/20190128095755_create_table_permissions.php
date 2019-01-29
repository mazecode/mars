<?php

use Illuminate\Database\Schema\Blueprint;
// use Phinx\Migration\AbstractMigration;

class CreateTablePermissions extends BaseMigration
{

    public function up()
    {
        $this->schema->create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('content_type_id');
            $table->string('codename');
            $table->boolean('is_active');
            $table->timestamps();
            $table->softDeletes();
        });
    }
    
    public function down()
    {
        $this->schema->dropIfExists('permissions');
    }

}
