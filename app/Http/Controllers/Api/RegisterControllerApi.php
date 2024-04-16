<?php

namespace App\Http\Controllers\Api;

use App\Adapters\ApiAdapter;
use App\DTO\Register\CreateRegisterDTO;
use App\DTO\Register\UpdateRegisterDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegistersRequest;
use App\Http\Requests\UpdateRegistersRequest;
use App\Http\Resources\RegisterResource;
use App\Services\RegistersService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegisterControllerApi extends Controller
{

    public function __construct(
        protected RegistersService $service,
    )
    {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $register = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('totalPerPage', 3),
            filter: $request->get('filter', null)
        );
       
        return ApiAdapter::toJson($register);
                                        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegistersRequest $request)
    {
        $register =$this->service->new(CreateRegisterDTO::makeFromRequest($request));
        return new RegisterResource($register);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $register = $this->service->findOne($id);
        if(!$register){
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }
        return new RegisterResource($register);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegistersRequest $request, string $id)
    {
        $register = $this->service->update(UpdateRegisterDTO::makeFromRequest($request, $id));
        
        if(!$register){
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }
        
        return new RegisterResource($register);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $register = $this->service->findOne($id);
        if(!$register){
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
