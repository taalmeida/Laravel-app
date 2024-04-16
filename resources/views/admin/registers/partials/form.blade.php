

@csrf() 
<div class="grid gap-6 mb-6 md:grid ">
    <div>
        <label for="first_name" class="mt-5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome</label>
        <input type="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nome" value="{{$register->name ?? old('name')}}" >
    </div>
</div>
<div class="grid gap-6 mb-6 md:grid cols-2">
    <div>    
        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CPF</label>
        <input type="number" name="cpf" placeholder="CPF"  class="bg-gray-50  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$register->cpf ??old('cpf')}}">
    </div>

      {{--   <input type="ratio" name="status" placeholder="status" value="{{$register->status ??old('status')}}"> --}}
    <div>
        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Número</label>
        <input type="number" name="number" placeholder="Número"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$register->number ??old('')}}">
    </div>

</div>
