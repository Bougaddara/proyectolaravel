<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class libros extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' =>$this->id,
            'nombre_libro'=>$this -> nombre_libro,
            'precio'=>$this -> precio,
            'descripcion'=>$this -> descripcion,
           // 'created_at'=> $this->created_at->format('d/m/Y'),
            //'updated_at'=> $this->updated_at->format('d/m/Y'),
        ];
    }
}
