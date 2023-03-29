<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HouseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'house_no' => $this->house_no,
            'society_id' => $this->society_id,
            'mobile_no' => $this->mobile_no,
            'box_no' => $this->box_no,
            'rent' => $this->rent,
            'credit' => $this->credit,
            'debit' => $this->debit,
        ];
    }
}
