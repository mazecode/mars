<?php

use Illuminate\Database\Schema\Blueprint;
// use Phinx\Migration\AbstractMigration;

class Users extends BaseMigration
{

    public function up()
    {
        $this->schema->create('users', function (Blueprint $table) {
            // Auto-increment id 
            $table->increments('id');
            $table->string('name');
            // Required for Eloquent's created_at and updated_at columns 
            $table->timestamps();
        });
    }
    
    public function down()
    {
        //
    }

}
