<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateInventarioResumenView extends Migration
{
    public function up()
    {
        DB::statement("
            CREATE VIEW inventario_resumen AS
            SELECT 
                p.id AS producto_id,
                p.codigo AS codigo_producto,
                p.nombre AS nombre_producto,
                c.nombre AS nombre_categoria,
                (
                    SELECT 
                        ei.precio_costo
                    FROM 
                        entradainventario ei
                    WHERE 
                        ei.producto_id = p.id
                    ORDER BY 
                        ei.created_at DESC
                    LIMIT 1
                ) AS precio_costo_actual,
                p.precio_venta AS precio_venta,
                COALESCE(SUM(entrada.cantidad), 0) AS total_entradas,
                COALESCE(SUM(salida.cantidad), 0) AS total_salidas,
                COALESCE(SUM(entrada.cantidad), 0) - COALESCE(SUM(salida.cantidad), 0) AS existencia
            FROM 
                productos p
            LEFT JOIN 
                categorias c ON p.categoria_id = c.id
            LEFT JOIN 
                entradainventario entrada ON p.id = entrada.producto_id
            LEFT JOIN 
                salidainventario salida ON p.id = salida.producto_id
            GROUP BY 
                p.id, p.codigo, p.nombre, c.nombre, p.precio_venta
            HAVING 
                total_entradas > 0 OR total_salidas > 0 
                    ");
    }

    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS inventario_resumen");
    }
}
