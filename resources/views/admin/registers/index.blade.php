@extends('adm.layouts.app')

@section('title', 'Cadastros')
    

@section('header')
<h3 class="text-3xl font-bold dark:text-white col-8 ">Cadastros</h3>
@endsection

@section('content')

<div class="col-4 my-5 mt-6">
  <a href="{{route('registers.create')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
  Novo Cadastro
  </a>

  <span class=" mx-6 text-blue-700 border border-blue-700  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
    Total de Cadastros: {{$registers->totalItems()}}
  </span>
</div>


<div class="mt-4 col-12 mt-6">
<div class="col-6">
  <form class="max-w-md" action="{{route('registers.index')}}" method="get">   
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="search" name ="filter"  value="{{$filters['filter'] ?? '' }}" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Procurar por Pessoa" required />
        <button  type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pesquisar</button>
    </div>
  </form>
</div>



<div class="relative overflow-x-auto shadow-md sm:rounded-lg">

<table  class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"> 
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="px-6 py-3" >Nome</th>
        <th scope="col" class="px-6 py-3">Status</th>
        <th scope="col" class="px-6 py-3">Action</th>
        <th scope="col" class="px-6 py-3">Action</th>
        
      </tr>
    </thead>

    <tbody>
        @foreach ($registers->items() as $register)
        <tr class="bg-white border-b  dark:bg-gray-800 dark:border-gray-700">
          <thscope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            <td>{{$register->name}}</td>
          </th>
          
          <td class="px-6 py-4">
            {{-- <x-status-register :status="$register->status">
             <x-status-register/> --}}

             <div class="flex items-center">
              <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                {{getStatusRegister($register->status)}}
              </span>  
            </div>
           </td>  
           
           <td class="px-6 py-4">
            <a href="{{route('registers.show', $register->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">ir</a>
           </td> 

           <td class="px-6 py-4">
            <a href="{{route('registers.edit', $register->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
           </td>
          </tr>
        @endforeach
    </tbody>
  </table>

</div>
<x-pagination
 :paginator="$registers"
 :appends="$filters"/>

 @endsection
