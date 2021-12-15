<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    use HasFactory;

    protected $table = "libros"; // eso pra el model puede ver  la tabra q hay en BD si el nombre de la tabla deferente 
    
    protected $fillable = ['id','nombre_libro','','descripcion','categoriaid','editorid','precio','entrega','imagen'];// eso pata insertar update para inseniar datas generalmente 

}
