<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    public function __construct()
    {

    }
    public function getOffers() { // eso para listar data 

        return Offer::select('id','name') -> get();
         
    }

    public function store(){

        offer::create([
                       'name'=>'offer3',
                       'price'=>'3000',
                       'details'=>'offer details',
                      ]);
     }


     public function create(){ //eso para el forme

        return view('offers.create');
     }


     public function insert(Request $request){ // eso para cojer datos q ponemos en el forme

        // validacion de data que hemos puesto 

        $rules=['name' => 'required | max:100 | unique:offers,name',   // 'required' eso te obliga poner datos y cualquir datos 
                'price' => 'required | numeric',
                'details' => 'required',
             ];

        $validator = Validator::make($request->all(),$rules,[ // rules => requiscitos de datos "tipo de litra ..... *kawaeid* "
                'name.required' => 'eso es obligatorio',  // eso es el mensaje de error si queremos ponerlo nosotros (ERROR)
                'name.unique' => 'ya existe ',
                'price.numeric' => 'el price tiene q ser un numero',   
        ]);
        
        if($validator -> fails()){

            return $validator -> errors(); // eso para todos los errors

        }

        //insertar data que es valida 
        Offer::create([
                         'name'=> $request -> name,
                         'price'=> $request -> price,
                         'details'=> $request -> details,
        ]);

        return 'se aguardado correctamente';
     }
     

}
