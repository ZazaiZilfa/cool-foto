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
            'postDesc' => $this->postDesc,
            'kodeUser' => $this->kodeUser,
            'postCategory' => $this->postCategory,
            'postImage' => $this->postImage,
            'postUrl' => $this->postUrl,
            'status' => $this->status,
            'approvalStatus' => $this->approvalStatus,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d'),
            'updated_at' => Carbon::parse($this->created_at)->format('Y-m-d'),
            'user' => $this->writer,
            'Kategori' => $this->kat,
        ];
    }
}
