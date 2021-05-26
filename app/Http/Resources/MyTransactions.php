<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MyTransactions extends JsonResource
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
            'grand_total'        => $this->grand_total,
            'payment_mode'       => $this->payment_mode,
            'transaction_status' => $this->transaction_status, 
        ];
    }
}
