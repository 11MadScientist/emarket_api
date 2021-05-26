<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Order extends JsonResource
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
            'id'                 => $this->id,
            'acc_id'             => $this->acc_id,
            'store_id'           => $this->store_id,
            'prod_id'            => $this->prod_id,
            'quantity'           => $this->quantity,
            'prod_price'         => $this->prod_price,
            'transaction_id'     => $this->transaction_id,
            'total'              => $this->total,
            'order_status'       => $this->order_status,
        ];
    }
}
