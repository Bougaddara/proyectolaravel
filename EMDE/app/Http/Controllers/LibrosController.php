<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libros;


class LibrosController extends Controller
{
    public function listarlibros(){

        $libros = Libros::paginate();

        //return view('libros');
        
        return view('homeLibros',compact('libros'));
    }

    /*public function listarcategurias(){

        $libros = Libros::all();

        //return view('libros');
        
        return view('homeLibros',compact('libros'));
    }
    */


}
