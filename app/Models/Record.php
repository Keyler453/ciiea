<?php

// En Record.php (Modelo)
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    // Definir los campos que se pueden llenar
    protected $fillable = [
        'nombre_completo', 
        'edad',
        'sexo', 
        'grado_estudios', 
        'institucion', 
        'departamento', 
        'direccion_institucion', 
        'ciudad', 
        'estado', 
        'tipo_institucion', 
        'telefono_oficina', 
        'celular', 
        'email_institucional', 
        'email_personal', 
        'linea_investigacion', 
        'nivel_educativo', 
        'usuario', 
        'correo', 
        'contrasena', 
        'recaptcha_token'
    ];
}
