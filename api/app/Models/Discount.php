<?php namespace App\Models;

class Discount extends Base
{
    protected $table = 'descuentos';
    protected $hidden = ['id'];
    protected $fillable = [];

    public static function fake()
    {
        return json_decode('[
            {
                "SEGMT_XLS" : ":porta.prepago:porta.movil.ow:porta.fijo.ow:bajas.ow.ent:bajas.ow.sal:porta.fijo.amdocs:porta.movil.amdocs:bajas.amdocs.ent:bajas.amdocs.sal:bajas.parti.converg:bajas.micro_me:porta.micro_me",
                "ID_DESCUENTO" : 1282365,
                "ACTIVO" : 1,
                "SEGMENTO" : "Particular",
                "CODIGO" : "DPR15",
                "NOMBRE_DTO" : "DPR15 - 15% - 12 meses",
                "N_MAX_CUOTAS" : 12,
                "DESCUENTO" : 15,
                "TIPO_DESC" : "%",
                "PRODUCTO" : "BUNDLE",
                "APLICA_EN" : "Cuota",
                "CODIGO_GENERADO" : "DPR15-1200015P",
                "APLICA_2LINEAS" : 0
            },
            {
                "SEGMT_XLS" : ":porta.movil.ow:porta.fijo.ow:bajas.ow.ent:bajas.ow.sal:porta.fijo.amdocs:porta.movil.amdocs:bajas.amdocs.ent:bajas.amdocs.sal:bajas.parti.converg:bajas.micro_me:porta.micro_me",
                "ID_DESCUENTO" : 1536714,
                "ACTIVO" : 1,
                "SEGMENTO" : "Particular",
                "CODIGO" : "DPR00",
                "NOMBRE_DTO" : "DPR00- 100%-3 meses",
                "N_MAX_CUOTAS" : 3,
                "DESCUENTO" : 100,
                "TIPO_DESC" : "%",
                "PRODUCTO" : "BUNDLE",
                "APLICA_EN" : "Cuota",
                "CODIGO_GENERADO" : "DPR00-0300100P",
                "APLICA_2LINEAS" : 0
            },
            {
                "SEGMT_XLS" : ":porta.movil.ow:porta.fijo.ow:bajas.ow.ent:bajas.ow.sal:porta.fijo.amdocs:porta.movil.amdocs:bajas.amdocs.ent:bajas.amdocs.sal:bajas.parti.converg:porta.micro_me",
                "ID_DESCUENTO" : 1536715,
                "ACTIVO" : 1,
                "SEGMENTO" : "Particular",
                "CODIGO" : "DPR00",
                "NOMBRE_DTO" : "DPR00- 100%-12 meses",
                "N_MAX_CUOTAS" : 12,
                "DESCUENTO" : 100,
                "TIPO_DESC" : "%",
                "PRODUCTO" : "BUNDLE",
                "APLICA_EN" : "Cuota",
                "CODIGO_GENERADO" : "DPR00-1200100P",
                "APLICA_2LINEAS" : 0
            },
            {
                "SEGMT_XLS" : ":porta.prepago:porta.movil.ow:porta.fijo.ow:porta.fijo.amdocs:porta.movil.amdocs",
                "ID_DESCUENTO" : 1560059,
                "ACTIVO" : 0,
                "SEGMENTO" : "Particular",
                "CODIGO" : "DPR50",
                "NOMBRE_DTO" : "DPR50 - 100% -\"Descuento indefinido sobre cuota del cliente\"",
                "N_MAX_CUOTAS" : 99,
                "DESCUENTO" : 100,
                "TIPO_DESC" : "%",
                "PRODUCTO" : "BUNDLE",
                "APLICA_EN" : "Cuota",
                "CODIGO_GENERADO" : "DPR50-9900100P",
                "APLICA_2LINEAS" : 0
            },
            {
                "SEGMT_XLS" : ":porta.prepago:porta.movil.ow:porta.fijo.ow:bajas.ow.ent:bajas.ow.sal:porta.fijo.amdocs:porta.movil.amdocs:bajas.amdocs.ent:bajas.amdocs.sal:bajas.parti.converg:porta.micro_me",
                "ID_DESCUENTO" : 1675569,
                "ACTIVO" : 1,
                "SEGMENTO" : "Particular",
                "CODIGO" : "DPR40",
                "NOMBRE_DTO" : "DPR40 - 40% - Sin permanencia",
                "N_MAX_CUOTAS" : 0,
                "DESCUENTO" : 40,
                "TIPO_DESC" : "%",
                "PRODUCTO" : "BUNDLE",
                "APLICA_EN" : "Cuota",
                "CODIGO_GENERADO" : "DPR40-0000040P",
                "APLICA_2LINEAS" : 0
            },
            {
                "SEGMT_XLS" : ":porta.prepago:porta.movil.ow:porta.fijo.ow:bajas.ow.ent:bajas.ow.sal:porta.fijo.amdocs:porta.movil.amdocs:bajas.amdocs.ent:bajas.amdocs.sal:bajas.parti.converg:porta.micro_me",
                "ID_DESCUENTO" : 1558845,
                "ACTIVO" : 1,
                "SEGMENTO" : "Particular",
                "CODIGO" : "DPR50",
                "NOMBRE_DTO" : "DPR50 - 50% - Descuento indefinido sobre cuota del cliente",
                "N_MAX_CUOTAS" : 99,
                "DESCUENTO" : 50,
                "TIPO_DESC" : "%",
                "PRODUCTO" : "BUNDLE",
                "APLICA_EN" : "Cuota",
                "CODIGO_GENERADO" : "DPR50-9900050P",
                "APLICA_2LINEAS" : 0
            },
            {
                "SEGMT_XLS" : ":porta.prepago:porta.movil.ow:porta.fijo.ow:bajas.ow.ent:bajas.ow.sal:porta.fijo.amdocs:porta.movil.amdocs:bajas.amdocs.ent:bajas.amdocs.sal:bajas.parti.converg:bajas.micro_me:porta.micro_me",
                "ID_DESCUENTO" : 1330306,
                "ACTIVO" : 1,
                "SEGMENTO" : "Particular",
                "CODIGO" : "DPR25",
                "NOMBRE_DTO" : "DPR25 - 25% - 12 meses",
                "N_MAX_CUOTAS" : 12,
                "DESCUENTO" : 25,
                "TIPO_DESC" : "%",
                "PRODUCTO" : "BUNDLE",
                "APLICA_EN" : "Cuota",
                "CODIGO_GENERADO" : "DPR25-1200025P",
                "APLICA_2LINEAS" : 0
            }
        ]');
    }
}