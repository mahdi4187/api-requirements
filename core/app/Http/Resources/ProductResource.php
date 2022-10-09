<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $discount = $this->sku == '000003' ? 15 : ($this->category === 'insurance' ? 30 : null);
        return [
            'sku' => $this->sku,
            'name' => $this->name,
            'category' => $this->category,
            'price' => [
                'original' => (int)$this->price,
                'final' => $discount ? $this->price - ($this->price * $discount / 100) : $this->price,
                'discount_percentage' => $discount ? $discount . '%' : null,
                'currency' => 'EUR'
            ],
        ];
    }
}
