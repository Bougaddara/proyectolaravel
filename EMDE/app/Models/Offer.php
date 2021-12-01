<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offer extends Model
{
    protected $table = "offers"; // eso pra el model puede ver  la tabra q hay en BD si el nombre de la tabla deferente 
    
    protected $fillable = ['name','price','details','created_at','updated_at'];// eso pata insertar update para inseniar datas generalmente 
    
    protected $hidden =['creat_at','updated_at',]; // eso para las culomnas que no la quiero  ver en mi app y funciona todos lo comandos de *select* estos culomnas no van a parecer nunca en tu app
    
    public $timestamp = false ; //eso para  disactivar la culomna de timestamp 


    
}
