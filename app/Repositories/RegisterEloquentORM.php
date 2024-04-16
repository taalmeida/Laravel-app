<?php

namespace App\Repositories;

use App\DTO\Register\CreateRegisterDTO;
use App\DTO\Register\UpdateRegisterDTO;
use App\Repositories\PaginationPresenter; 
use App\Models\Registers;
use App\Repositories\RegisterRepositoryInterface;
use stdClass;
use function PHPUnit\Framework\objectEquals;

class RegisterEloquentORM implements RegisterRepositoryInterface
{
    public function __construct(
        protected Registers $model
    )
    {}

    public function paginate(string $filter= null, int $page=1,int $totalPerPage=10): PaginationInterface
    {
        $result = $this->model
        ->where(function($query) use ($filter){
            if ($filter) {
               $query-> where('name', $filter);
               ///  status
            }
        }) 
        ->paginate($totalPerPage, ["*"], 'page', $page);

    /* dd((new PaginationPresenter($result))->isLastPage()); */
       /*dd((new PaginationPresenter($result))->items()); */

         return new PaginationPresenter($result);
    }

    public function getAll(string $filter = null): array
    {
        return $this->model
        ->where(function($query) use ($filter){
            if ($filter) {
               $query-> where('name', $filter);
               ///  
            }
        }) 
        ->get()
        ->toArray();
    }

    public function findOne(string $id): stdClass|null
    {
        $register = $this->model->find($id);
        if (!$register) {
           return null;
        }

        return (object) $register ->toArray();
        
    }
    public function delete(string $id): void
    {
         $this->model->findOrFail($id)->delete();
    }

    public function new(CreateRegisterDTO $dto): stdClass
    {
        $register = $this->model->create(
            (array) $dto
        );
        return (object) $register->toArray();

    }
    
    public function update(UpdateRegisterDTO $dto): stdClass|null
    {
        $register = $this->model->find($dto->id);
        if (!$register) {
           return null;
        }
         $register->update(
            (array) $dto
         );   
         return (object) $register->toArray();
    }
}