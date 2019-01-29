<?php

use Illuminate\Database\Schema\Blueprint;
// use Phinx\Migration\AbstractMigration;

class CreateUsersTable extends BaseMigration
{

    public function up()
    {
        $this->schema->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surnames');
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->integer('acd')->nullable();
            $table->string('team_leader')->nullable();
            $table->string('agency')->nullable();
            $table->string('service')->nullable();
            $table->string('segment')->nullable();
            $table->boolean('is_active')->default(true);
            $table->tinyInteger('id_role')->default(1);
            $table->string('location')->nullable();
            $table->boolean('is_fijo')->default(false);
            $table->string('team_admin')->nullable();
            $table->string('access_token', 255);
            $table->string('pwd_update')->nullable();
            $table->string('pwd_history')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }
    
    public function down()
    {
        $this->schema->dropIfExists('users');
    }

}
