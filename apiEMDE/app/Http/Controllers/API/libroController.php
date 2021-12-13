<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Libros;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\libros as librosResource;



class libroController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libros::all();
        return $this->sendResponse(librosResource::collection($libros), '¡Publicaciones recuperadas con éxito!' );
    }

    //public function userPosts($id)
    //{
    //$libros = Libros::where('user_id' , $id)->get();
    //return $this->sendResponse(PostResource::collection($posts), 'Posts retrieved Successfully!' );
    //}
//###############################################################################################################################
   
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'nombre_libro'=>'required',
            'descripcion'=>'required',
            'precio'=>'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validar error',$validator->errors() );
        }

       // $user = Auth::user();
       // $input['user_id'] = $user->id;
        $libros = Libros::create($input);
        return $this->sendResponse(new librosResource($libros), '¡La publicación se agregó correctamente!' );
    }

    //###########################################################################################################
    public function show($id)
    {
        $libros = Libros::find($id);
        if (is_null($libros)) {
            return $this->sendError('¡Publicación no encontrada!' );
        }
        return $this->sendResponse(new librosResource($libros), '¡Publicación recuperada con éxito!' );
    }

//################################################################################################################

    public function update(Request $request, Libros $libros)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'nombre_libro'=>'required',
            'descripcion'=>'required',
            'precio'=>'required'

        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation error' , $validator->errors());
        }


       // if ( $libros->user_id != Auth::id()) {
        //    return $this->sendError('no tienes acceso' , $validator->errors());
       // }
        $libros->nombre_libro = $input['nombre_libro'];
        $libros->descripcion = $input['descripcion'];
        $libros->precio = $input['precio'];
        $libros->save();

        return $this->sendResponse(new librosResource($libros), 'Publicación actualizada con éxito!' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//#####################################################################################################################
    public function destroy(Libros $libros)
    {
        $errorMessage = [] ;

       // if ( $libros->user_id != Auth::id()) {
       //     return $this->sendError('no tienes acceso' , $errorMessage);
       // }
        $libros->delete();
        return $this->sendResponse(new librosResource($libros), '¡Publicación eliminada con éxito!' );
    }
}
