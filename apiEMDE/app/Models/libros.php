<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class libros extends Model
{
    use HasFactory;

    protected $table = "libros"; // eso pra el model puede ver  la tabra q hay en BD si el nombre de la tabla deferente 
    
    protected $fillable = ['id','nombre_libro','descripcion','categoriaid','editorid','precio','entrega','imagen'];// eso pata insertar update para inseniar datas generalmente 
    
    // protected $hidden =['creat_at','updated_at',]; // eso para las culomnas que no la quiero  ver en mi app y funciona todos lo comandos de *select* estos culomnas no van a parecer nunca en tu app
    
    // public $timestamp = false ; //eso para  disactivar la culomna de timestamp 
     // const updated_at = false;
}
