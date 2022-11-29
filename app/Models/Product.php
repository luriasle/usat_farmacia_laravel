<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = ["descripcion", "stock", "costo", "precio_venta", "registro_sanitario","fecha_vencimiento","estado","presentation_id","laboratory_id"];

    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class);
    }

    public function presentation()
    {
        return $this->belongsTo(Presentation::class);
    }
}
