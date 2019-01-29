<?php

use Illuminate\Database\Schema\Blueprint;

class CreateRatesTable extends BaseMigration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('rates', function (Blueprint $table) {
            $table->increments('id');
            $table->string("segment"); // : "Particular",
            $table->string("segment_xls"); // : ":porta.parti:porta.en_fi_post:porta.en_mo_post:sac.planes:bajas.parti.n1:bajas.parti.n2:kos.parti",
            $table->string("code"); // : "SIXS2",
            $table->string("name"); // : "(Antigua) Plan Mini Clásica",
            $table->string("id_operator"); // : 1,
            $table->string("type"); // : "VOZ",
            $table->string("CUOTA_LINEA_FIJO"); // : null,
            $table->string("LIMITES_A_FIJO"); // : null,
            $table->string("TARIFA_FUERA_FIJO"); // : null,
            $table->string("ESTABLECIMIENTO_FIJO"); // : null,
            $table->string("CUOTA_ADSL"); // : null,
            $table->string("CUOTA_LINEA_ADSL"); // : null,
            $table->integer("CUOTA_TOTAL"); // : 14.876,
            $table->string("BAJADA"); // : null,
            $table->string("SUBIDA"); // : null,
            $table->string("LLAMADAS_A_FIJO"); // : null,
            $table->string("LLAMADAS_A_MOVILES"); // : null,
            $table->string("OTROS"); // : null,
            $table->string("MINUTOS"); // : null,
            $table->string("GCU"); // : null,
            $table->string("TARIFA_FUERA_MOVIL"); // : null,
            $table->string("ESTABLECIMIENTO_VOZ"); // : null,
            $table->string("SMS"); // : "12c\/sms (iva. Incl.)",
            $table->string("LIMITES"); // : null,
            $table->string("DATOS"); // : "1,5 GB",
            $table->string("PERMANENCIA"); // : 18,
            $table->string("TIENE_PERMANENCIA"); // : "Si",
            $table->string("VPN"); // : " ",
            $table->string("FAMILIA"); // : "ONO:NORMAL_BAJAS",
            $table->string("ESPECIAL"); // : null,
            $table->string("CUOTA_ESPECIAL12M"); // : 17.999959999999998,
            $table->string("TARIFA_OF_ESCRITO"); // : "Plan Mini Clásica",
            $table->string("PORTABILIDADEMPRESA1"); // : null,
            $table->string("PORTABILIDADEMPRESA2"); // : null,
            $table->string("PORTABILIDADEMPRESA3"); // : null,
            $table->string("PORTABILIDADPARTICULAR1"); // : null,
            $table->string("PORTABILIDADPARTICULAR2"); // : null,
            $table->string("PORTABILIDADPARTICULAR3"); // : null,
            $table->string("ARGUMENT_PORT_E_1"); // : null,
            $table->string("ARGUMENT_PORT_E_2"); // : null,
            $table->string("ARGUMENT_PORT_E_3"); // : null,
            $table->string("ARGUMENT_PORT_P_1"); // : null,
            $table->string("ARGUMENT_PORT_P_2"); // : null,
            $table->string("ARGUMENT_PORT_P_3"); // : null,
            $table->string("PORTABILIDADPARTICULAR1_ONO"); // : null,
            $table->string("ARGUMENT_PORT_P_1_ONO"); // : null,
            $table->string("PORTABILIDADPARTICULAR2_ONO"); // : null,
            $table->string("ARGUMENT_PORT_P_2_ONO"); // : null,
            $table->string("PORTABILIDADPARTICULAR3_ONO"); // : null,
            $table->string("ARGUMENT_PORT_P_3_ONO"); // : null,
            $table->string("ORDEN"); // : null,
            $table->string("TIPO_TAR_COMP"); // : null,
            $table->string("ORIGEN_TAR"); // : null,
            $table->string("CUOTA_AVG"); // : null,
            $table->string("SALTO_LINEA"); // : null,
            $table->string("NOMBRE_COMERCIAL"); // : null,
            $table->string("MAS_LINEAS"); // : null,
            $table->string("SERVICIO_AGRUPADO"); // : null,
            $table->string("CON_TV"); // : null,
            $table->string("CUOTA_PROMO"); // : null,
            $table->string("DURACION"); // : null,
            $table->string("DTO_PROMO"); // : null,
            $table->string("TIPO_DTO_PROMO"); // : null,
            $table->string("FECHA"); // : null,
            $table->string("CODIGO_OFERTA"); // : null            
            $table->boolean("is_active"); // : 0,
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
        $this->schema->dropIfExists('rates');
    }
}
