<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'copies' => $this->copies->map(function ($copy) {
                return [
                    'id' => $copy->id,
                    'book' => $copy->book->name,
                    'author' => $copy->book->author->name,
                ];
            }),
        ];
    }
}
