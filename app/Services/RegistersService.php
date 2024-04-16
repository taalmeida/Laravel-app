<?php

namespace App\Services;

use App\DTO\Register\CreateRegisterDTO;
use App\DTO\Register\UpdateRegisterDTO;
use App\Repositories\PaginationInterface;
use App\Repositories\RegisterRepositoryInterface;
use stdClass;

class RegistersService
{
   

    //interface do repositorio
    public function __construct(
        //injeção de dependencia
        protected RegisterRepositoryInterface $repository
    )
    {}

    public function paginate( 
        int $page,
        int $totalPerPage,
        string $filter= null
    ):PaginationInterface
    {
        return $this->repository->paginate(
            page: $page,
            totalPerPage: $totalPerPage,
            filter: $filter
        );

    }
    public function getAll(string $filter = null):array
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }
    //Colocar os parametros da função new e update
    public function new(CreateRegisterDTO $dto):stdClass
    {
        return $this->repository->new($dto);
    }

    public function update(UpdateRegisterDTO $dto):stdClass|null
    {
        return $this->repository->update($dto);
    }

    public function delete(string $id): void
    {
       $this->repository->delete($id);
    }

}