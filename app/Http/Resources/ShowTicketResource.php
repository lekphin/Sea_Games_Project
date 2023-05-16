<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowTicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' =>$this->id,
            'price' =>$this->price,
            'date' =>$this->date,
            'user_id' =>$this->user_id,
            'event_id' =>$this->event_id,
            'events'=>EventResource::collection($this->events),
        ];
    }
}
