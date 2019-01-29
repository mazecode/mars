<?php

use Illuminate\Database\Schema\Blueprint;

class CreateDiscountsTable extends BaseMigration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string("segment"); // : "Particular",
            $table->string("segment_xls"); // : ":porta.prepago:porta.movil.ow:porta.fijo.ow:bajas.ow.ent:bajas.ow.sal:porta.fijo.amdocs:porta.movil.amdocs:bajas.amdocs.ent:bajas.amdocs.sal:bajas.parti.converg:bajas.micro_me:porta.micro_me",
            $table->string("name"); // : "DPR15 - 15% - 12 meses",
            $table->string("code"); // : "DPR15",
            $table->integer("n_max_dues"); // : 12,
            $table->integer("disc"); // : 15,
            $table->enum("type_dsct", ['P', 'E']); // : "%",
            $table->string("product"); // : "BUNDLE",
            $table->string("APLICA_EN"); // : "Cuota",
            $table->string("CODIGO_GENERADO"); // : "DPR15-1200015P",
            $table->integer("APLICA_2LINEAS"); // : 0            
            $table->boolean("is_active"); // : 1,
            $table->timestamps();
            $table->softDeletes();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema->dropIfExists('discounts');
    }
}
