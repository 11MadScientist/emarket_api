<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Cart extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id'       => $this->id,
            'acc_id'   => $this->acc_id,
            'store_id' => $this->store_id,
            'prod_id'  => $this->prod_id,
            'prod_qty' => $this->prod_qty,
            'prod_price'=> $this->prod_price,
            'total'    => $this->total,
        ];
    }
}
