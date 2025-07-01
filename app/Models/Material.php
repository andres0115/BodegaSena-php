<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $primaryKey = 'id_material';
    protected $fillable = [
        'codigo_sena',
        'nombre_material',
        'descripcion_material',
        'unidad_medida',
        'producto_peresedero',
        'estado',
        'fecha_vencimiento',
        'imagen',
        'fecha_creacion',
        'fecha_modificacion',
        'caracteristica_id',
        'tipo_material_id',
    ];

    public function tipoMaterial()
    {
        return $this->belongsTo(TipoMaterial::class, 'tipo_material_id', 'id_tipo_material');
    }

    public function caracteristica()
    {
        return $this->belongsTo(Caracteristica::class, 'caracteristica_id', 'id_caracteristica');
    }
}
