<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Register\{CreateRegisterDTO, UpdateRegisterDTO};
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegistersRequest;
use App\Http\Requests\UpdateRegistersRequest;
use App\Models\Registers;
use App\Services\RegistersService;
use Illuminate\Http\Request;

class RegistersController extends Controller
{

    public function __construct(

        protected RegistersService $service
    )
    {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $registers =  $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('totalPerPage', 3),
            filter: $request->get('filter', null)
        );
        //dados que irao persistir independente do filtro
        $filters = ['filter' => $request->get('filter', '')];
         return view('admin/registers/index', compact('registers', 'filters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/registers/create');
    }

    /**
     * Store a newly created resource in storage.
     */
       
    public function store(StoreRegistersRequest $request)
    {
     $this->service->new(CreateRegisterDTO::makeFromRequest($request));
          
        
     /*$registers = new Registers;
       $registers->name = $request->name;
       $registers->cpf= $request->cpf;
       $registers->number= $request->number;
       $registers->save(); */

       return redirect()->route('registers.index')
       ->with('message', 'Cadastrado com Sucesso');  
        
    }

    /**
     * Display the specified resource.
     */
    //mudar isso aqui
    public function show(string $id)
    {
        $register = $this->service->findOne($id);
        if (!$register) {
            return back();
        }

        return view('admin/registers/show', compact(['register']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!$register = $this->service->findOne($id)) {
            return back();
        }
        return view('admin/registers/edit', compact('register'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegistersRequest $request)
    {
        $register = $this->service->update(UpdateRegisterDTO::makeFromRequest($request));
        
        if(!$register){
            return back();
        }
        
        return redirect()->route('registers.index')
        ->with('message', 'Editado com Sucesso');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    { 
        $this->service->delete($id);
        return redirect()->route('registers.index')
        ->with('message', 'Deletado com Sucesso');           ;
    }
}
