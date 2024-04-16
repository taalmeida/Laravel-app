<?php

namespace App\DTO\Register;

use App\Enums\RegisterStatus;
use App\Http\Requests\StoreRegistersRequest;

class CreateRegisterDTO
{

    public function __construct(
        public string $name,
        public int $cpf,
        public RegisterStatus $status,
        public int $number,
        
    )
    {}

    public static function makeFromRequest(StoreRegistersRequest $request):self
    {
        return new self(
            $request-> name,
            $request->cpf,
            RegisterStatus:: A,
            $request -> number
            
        );

    }
}