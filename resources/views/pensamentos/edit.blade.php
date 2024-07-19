@extends('layout')

@section('content')
    <h1>Editar Pensamento</h1>
    <form action="{{ route('pensamentos.update', $pensamento->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="pensamento">Pensamento:</label>
        <input type="text" name="pensamento" id="pensamento" value="{{ $pensamento->pensamento }}">
        <button type="submit">Salvar</button>
    </form>
@endsection
