@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Eliminar Categoría</h1>

        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <div class="alert alert-warning">
                ¿Estás seguro de que quieres eliminar la categoría <strong>{{ $category->name }}</strong>?
            </div>
            <button type="submit" class="btn btn-danger">Eliminar</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
