<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'identify'=>$this->id,
            'name'=> $this->name,
            'cpf'=> $this->cpf,
            'number'=> $this->number,
            'dt_created' => Carbon::make($this->create_at)->format('Y-m-d'),

        ];
    }
}
