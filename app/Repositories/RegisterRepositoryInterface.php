<?php

namespace App\Repositories;


use App\DTO\Register\CreateRegisterDTO; 
use App\DTO\Register\UpdateRegisterDTO;
use stdClass;

interface RegisterRepositoryInterface
{
    public function paginate(string $filter= null, int $page=1,int $totalPerPage=6): PaginationInterface;
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): void;
    public function new(CreateRegisterDTO $dto): stdClass;
    public function update(UpdateRegisterDTO $dto): stdClass|null;
    
}