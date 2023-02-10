<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='reservations';
    public function toArray($request)
    {
      //  return parent::toArray($request);
      return [
        'reservation_id'=>$this->resource->reservation_id,
        'date'=>$this->resource->reservation_date,
        'number_of_people'=>$this->resource->number_of_people,
        'package'=>$this->resource->package,
        'client'=>$this->resource->client,
        'user'=>new UserResource($this->resource->user)
         ];
    }
}
