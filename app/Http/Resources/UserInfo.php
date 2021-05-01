<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserInfo extends JsonResource
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
            'id'        => $this->id,
            'firstname' => $this->firstname,
            'lastname'  => $this->lastname,
            'password'  => $this->password,
            'email'     => $this->email,
            'addresss'  => $this->password,
            'usertype'  => $this->usertype,
            'created_at'=> $this->created_at,
            'profilepic'=> $this->profilepic,
        ];
    }
}
