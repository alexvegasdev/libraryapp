<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RecordCollection extends ResourceCollection
{

    public static $wrap = 'record';


    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }


    /**
     * Get additional data that should be returned with the resource array.
     *
     * @return array<string, mixed>
     */
    // public function with(Request $request): array
    // {
    //     return [
    //         'meta' => [
    //             'key' => 'value',
    //         ],
    //     ];
    //}
}
