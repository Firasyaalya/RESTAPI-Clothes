<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TypeDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'number' => $this->number,
            'image' => $this->image,
            'name_clothes' => $this->name_clothes,
            'type_clothes' => $this->type_clothes,
            'price' => $this->price,
            'created_at'=> date_format($this->created_at, "Y/m/d H:i:s"),
            'seller' => $this->seller,
            'dealers' => $this->whenLoaded('dealers'), // whenLoaded jika kamu tidak ingin melihat lebih detail lagi mengenai users
        ];
    }
}
