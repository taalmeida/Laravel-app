@extends('adm.layouts.app')
@section('title', 'Editar')

@section('header')
<h3 class="text-3xl font-bold dark:text-white">Editar Cadastro</h3>
@endsection

@section('content')
<x-alert/>
<form action="{{route('registers.update', $register->id)}}" method="POST">

@method('PUT')
@include('admin.registers.partials.form')

<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Editar</button>

</form>
@endsection
