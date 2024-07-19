<?php

namespace App\Http\Controllers;

use App\Models\Pensamento;
use Illuminate\Http\Request;


class PensamentoController extends Controller
{
    public function index(Request $request)
    {

    $totalPensamentos = Pensamento::count();

    $query = Pensamento::query();
    if ($request->has('search') && !empty($request->input('search'))) {
        $search = $request->input('search');
        $query->where('pensamento', 'LIKE', "%{$search}%");

        $totalPensamentos = $query->count();
    }

    $pensamentos = $query->paginate(5);

    return view('pensamentos.index', compact('pensamentos', 'totalPensamentos'));
    }

    public function create()
    {
        return view('pensamentos.create');
    }

    public function store(Request $request)
    {
        try {
            Pensamento::create($request->all());
            return redirect()->route('pensamentos.index')
                             ->with('success', 'Nota criada com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('pensamentos.index')
                             ->with('error', 'Erro ao criar a nota.');
        }
    }

    public function show(Pensamento $pensamento)
    {
        return view('pensamentos.show', compact('pensamento'));
    }

    public function edit(Pensamento $pensamento)
    {
        return view('pensamentos.edit', compact('pensamento'));
    }

    public function update(Request $request, Pensamento $pensamento)
    {
        $request->validate(['pensamento' => 'required']);
        $pensamento->update($request->all());
        return redirect()->route('pensamentos.index')
                        ->with('success', 'Nota atualizada com sucesso.');
    }

    public function destroy(Pensamento $pensamento)
    {
        $pensamento->delete();
        return redirect()->route('pensamentos.index')
                        ->with('success', 'Nota deletada com sucesso.');
    }
}
