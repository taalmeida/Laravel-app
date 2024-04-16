<?php
use App\Enums\RegisterStatus;

//pegar o valor do stts
if(!function_exists('getStatusRegister')){
    function getStatusRegister(string $status): string{
        return RegisterStatus::fromValue($status);
    }
}
/*(Para utilizar de forma global)
no composer.json

"autoload-dev": {
    "psr-4": {
        "Tests\\": "tests/"
    },
   
   "files": ["app/Helpers/functions.php"]
} */