<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestsRequest;
use App\Http\Requests\UpdateTestsRequest;
use App\Models\Tests;

class TestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('teste');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tests $tests)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tests $tests)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestsRequest $request, Tests $tests)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tests $tests)
    {
        //
    }
}
