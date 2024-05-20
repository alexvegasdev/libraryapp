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
            'user'=>$this->user ? $this->user->firstname : null,
            'loan_date'=>$this->loan_date->format('Y-m-d'),
            'return_date'=>$this->return_date->format('Y-m-d'),
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
