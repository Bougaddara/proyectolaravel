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
            'libro_id' =>$this->libro_id,
            'nombre_libro'=>$this -> nombre_libro,
            'precio'=>$this -> precio,
        ];
    }
}
