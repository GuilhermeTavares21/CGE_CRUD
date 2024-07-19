@extends('layout')

@section('content')
    <h1>Criar Pensamento</h1>
    <form action="{{ route('pensamentos.store') }}" method="POST">
        @csrf
        <label for="pensamento">Pensamento:</label>
        <input type="text" name="pensamento" id="pensamento">
        <button type="submit">Salvar</button>
    </form>
@endsection
