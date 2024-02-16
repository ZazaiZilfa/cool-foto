<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->idPost,
            'postTitle' => $this->postTitle,
            'kodePost' => $this->kodePost,
            'kodeUser' => $this->kodeUser,
            'postCategory' => $this->postCategory,
            'postImage' => $this->postImage,
            'postUrl' => $this->postUrl,
            'status' => $this->status,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d'),
        ];
    }
}
