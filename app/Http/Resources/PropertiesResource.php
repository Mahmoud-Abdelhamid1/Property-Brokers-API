<?php

namespace App\Http\Resources;

use App\Models\Broker;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertiesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $broker = Broker::find($this->broker_id) ;
        return [
            'id' => (string)$this->id,
            'attributes'=>[
                'address' => $this->address,
                'listing_type' => $this->listing_type,
                'city' => $this->city,
                'zip_code' => $this->zip_code,
                'description' => $this->description,
                'build_year' => $this->build_year,
            ],
            'characterstics'=>[
               new CharacrteristicsResource($this->charactristic)
            ],
            'Broker' => [
                new BrokersResources($broker)
            ],
        ];
    }
}
