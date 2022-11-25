<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoVendido extends Model
{
    protected $table = "detalle_ventas";
    protected $fillable = ["id_venta", "descripcion", "codigo_barras", "precio", "cantidad"];
}
