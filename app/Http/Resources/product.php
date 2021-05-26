<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
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
            'store_id'           => $this->store_id,
            'category_id'        => $this->category_id,
            'category_name'      => $this->category_name,
            'prod_name'          => $this->prod_name,
            'prod_img'           => $this->prod_img,
            'prod_price'         => $this->prod_price,
            'prod_unit'          => $this->prod_unit,
            'prod_desc'          => $this->prod_desc,
            'prod_stock'         => $this->prod_stock,
            'prod_sales'         => $this->prod_sales,
            'prod_avail'         => $this->prod_avail,
            'prod_favorite'      => $this->prod_favorite,
        ];
    }
}
