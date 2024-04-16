<?php

namespace App\DTO\Register;

use App\Enums\RegisterStatus;
use App\Http\Requests\UpdateRegistersRequest;

class UpdateRegisterDTO 
{
 
    public function __construct(
        public string $id,
        public string $name,
        public int $cpf,
        public RegisterStatus $status,
        public int $number
       

    )
    {}

    public static function makeFromRequest(UpdateRegistersRequest $request):self
    {
        return new self(
            $request -> id,
            $request-> name,
            $request->cpf,
            RegisterStatus:: A,
            $request -> number
         
        );

    }

}