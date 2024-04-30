<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
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
            'loan_date'=>$this->loan_date,
            'return_date'=>$this->return_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status'=>$this->status ? $this->status->name : null,
            'copies' => $this->copies->map(function ($copy) {
                return [
                    'id' => $copy->id,
                    'book' => $copy->book->title,
                    'author' => $copy->book?->author?->name,
                ];
            }),
            
        ];
    }
}
