@extends('adm.layouts.app')
@section('title', 'Dados')

@section('header')
<h3 class="text-3xl font-bold dark:text-white col-8 mb-4">Dados Pessoa {{$register-> id}}</h3>

@endsection

@section('content')


<form class="max-w-sm mt-auto">

<ul class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    <li class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg dark:border-gray-600">   Nome: {{$register-> name }}</li>
    <li class="w-full px-4 py-2 border-b border-gray-200 dark:border-gray-600"> CPF: {{$register-> cpf }}</li>
    <li class="w-full px-4 py-2 border-b border-gray-200 dark:border-gray-600">Número: {{$register-> number}}</li>
</ul>

</form>

 <div class="col-4 mx-auto mt-6 cols-2 ">
    <a href="{{route('registers.index')}}" class=" mx-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
     Voltar
    </a>
    <form action="{{ route('registers.destroy', $register->id)}} " method="post" scope="col" class="px-6 py-3">
        @csrf
        @method('DELETE')
        <button type="submit" class=" text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3.5 py-2 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900" >Deletar</button>    
    </form>
  </div>
@endsection
