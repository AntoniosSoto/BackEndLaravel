<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoContacto extends Model
{
    use HasFactory;

    protected $fillable = ['telefono', 'correo', 'direccion'];

    public function contacto()
    {
        return $this->belongsTo(Contacto::class);
    }
}