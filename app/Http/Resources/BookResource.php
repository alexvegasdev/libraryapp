<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'edition_year' => $this->edition_year,
            'author' => $this->author ? $this->author->name : null,
            'genres' => $this->genres->pluck('name')->flatten(),
            'created_at'=>$this->created_at->format('Y-m-d')
            //'copies_count'=>$this->copies_count ?? 0 
        ];
    }
}
