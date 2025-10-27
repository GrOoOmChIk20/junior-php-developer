<?php

namespace App\Http\Resources\laravel_crud;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ListTaskResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'description' => $this->description,
            'status'      => $this->status,
        ];
    }
}
