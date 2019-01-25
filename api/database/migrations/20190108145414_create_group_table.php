<?php

use Illuminate\Database\Schema\Blueprint;

class CreateGroupTable extends BaseMigration
{
    public function up()
    {
        // $this->schema->create('widgets', function (Blueprint $table) {
        //     // Auto-increment id 
        //     $table->increments('id');
        //     $table->integer('serial_number');
        //     $table->string('name');
        //     // Required for Eloquent's created_at and updated_at columns 
        //     $table->timestamps();
        // });
    }
    public function down()
    {
        // $this->schema->drop('widgets');
    }
}