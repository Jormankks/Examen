<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nueva Categoría</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100">

    <x-app-layout class="py-8">
        <main class="mt-20">
            <div class="max-w-4xl mx-auto p-6 bg-gray-800 rounded-lg shadow-md">
                <h2 class="text-xl font-bold mb-4">Agregar Nueva Categoría</h2>
                
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="title" class="block text-sm font-medium">Título:</label>
                        <input type="text" id="title" name="title" class="w-full mt-1 p-2 bg-gray-700 rounded">
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-medium">Descripción:</label>
                        <textarea id="description" name="description" class="w-full mt-1 p-2 bg-gray-700 rounded"></textarea>
                    </div>
                    <div>
                        <label for="category_id" class="block text-sm font-medium">Categoría:</label>
                        <select name="category_id" id="category_id" class="w-full mt-1 p-2 bg-gray-700 rounded">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <input type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded shadow" value="Registrar Tarea">
                </form>
                

                @if (session('success'))
                    <div class="mt-4 text-green-500">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mt-6">
                    <a href="{{ route('categories.index') }}" class="text-indigo-600 hover:text-indigo-700">Volver a la lista de categorías</a>
                </div>
            </div>
        </main>
    </x-app-layout>

</body>
</html>
