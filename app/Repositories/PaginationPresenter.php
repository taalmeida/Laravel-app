<?php
//Exibe os dados em paginas
namespace App\Repositories;
//infos da paginação
use Illuminate\Pagination\LengthAwarePaginator;
use stdClass;

class PaginationPresenter implements PaginationInterface
{
    
    private array $items;

    public function __construct(
        protected LengthAwarePaginator $paginator
    )
    {
        //array items recebe o metodo items do paginator 
         $this->items = $this->resolveItems($this->paginator->items());
    }

public function items(): array
{
    // retorna o array items
   return $this->items;
}
public function totalItems(): int
{ 
    return $this->paginator->total() ?? 0;
}

public function isFirstPage():bool
{
    return $this->paginator->onFirstPage();
}

public function isLastPage():bool
{
    //retorna 'true' se a pagina atual for igual a ultima pagina
    return $this->paginator->lastPage() === $this->paginator->currentPage();
}

public function currentPage(): int
{
   return $this->paginator->currentPage() ?? 1;
}

public function getNumberNextPage(): int
{
     
        return $this->paginator->currentPage() + 1;
    
}

public function getNumberPreviousPage(): int
{
    
        return $this->paginator->currentPage() - 1;

}
//função para converter cada item para stdClass
private function resolveItems( array $items): array
{
    //'cria' um stdClass para cada item($items as $item)
    $response = [];
    foreach ($items as $item) {
     $stdClassObject = new stdClass;
        foreach ($item->toArray() as $key => $value) {
            $stdClassObject->{$key} = $value;
                      //key é o nome da coluna e value o valor
        }
        array_push($response, $stdClassObject);
    }
    
    return $response;

}

}