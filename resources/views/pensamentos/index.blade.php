@extends('layout')

@section('content')

    <div class="index_header">
        <div class="contagem_notas">
            @if ($totalPensamentos > 0)
                <div class="contagem_notas">
                    <p>{{ $totalPensamentos }} {{ $totalPensamentos > 1 ? 'notas' : 'nota' }} ao total</p>
                </div>
            @else
                <p>Você não possui nenhuma nota cadastrada <i class="fa-solid fa-face-sad-tear"></i></p>
            @endif
        </div>

        <a class="add_nota" href="#" data-toggle="modal" data-target="#createModal"><p id="plus">+</p><p>Adicionar nota</p></a>
    </div>

    <form method="GET" action="{{ route('pensamentos.index') }}" class="form-inline">
        <input type="text" name="search" class="form-control filtrar" placeholder="Filtrar..." value="{{ request()->input('search') }}">
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i> Filtrar</button>
    </form>

    @if ($message = Session::get('success'))
        <div id="successPopup" class="successPopup" style="display: none;">
            <p class="sucesso">{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div id="successPopup" class="errorPopup" style="display: none;">
            <p class="sucesso">{{ $message }}</p>
        </div>
    @endif


    <ul class="ul_notas">
        @foreach ($pensamentos as $pensamento)
            <li class="li_notas">
                <div class="id_nota">{{ $pensamento->id }}</div>
                <div class="pensamento">
                    @if (strlen($pensamento->pensamento) > 40)
                        {{ substr($pensamento->pensamento, 0, 40) }}...
                        <a href="#" data-toggle="modal" data-target="#viewModal{{ $pensamento->id }}">Ver mais</a>
                    @else
                        {{ $pensamento->pensamento }}
                    @endif
                </div>
                <div class="acoes">
                    <a class="action_btn" href="#" data-toggle="modal" data-target="#editModal{{ $pensamento->id }}"><i class="fa-solid fa-pen"></i></a>
                    <a class="action_btn" href="#" data-toggle="modal" data-target="#deleteModal{{ $pensamento->id }}"><i class="fa-solid fa-trash"></i></a>
                </div>
            </li>

            <div class="modal fade" id="viewModal{{ $pensamento->id }}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel{{ $pensamento->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewModalLabel{{ $pensamento->id }}">Nota {{$pensamento->id}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div id="nota_completa" class="modal-body">
                            {{ $pensamento->pensamento }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editModal{{ $pensamento->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $pensamento->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $pensamento->id }}">Editar Nota</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('pensamentos.update', $pensamento->id) }}" method="POST" onsubmit="showPopup()">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="pensamento">Nota</label>
                                    <input type="text" class="form-control" id="pensamento" name="pensamento" value="{{ $pensamento->pensamento }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Salvar mudanças</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="deleteModal{{ $pensamento->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $pensamento->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $pensamento->id }}">Deletar Nota</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('pensamentos.update', $pensamento->id) }}" method="POST" onsubmit="showPopup()">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <p>Você tem certeza que deseja remover essa nota?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <form action="{{ route('pensamentos.destroy', $pensamento->id) }}" method="POST" style="display:inline;" onsubmit="showPopup()">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Deletar</button>
                                </form>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </ul>
    <div class="pagination">
        {{ $pensamentos->appends(request()->query())->onEachSide(0)->links() }}
    </div>

    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Adicionar Nova Nota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('pensamentos.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="pensamento">Nota</label>
                            <input type="text" class="form-control" id="pensamento" name="pensamento">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Adicionar Nota</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    function showPopup() {
        var popup = document.getElementById('successPopup');
        popup.style.display = 'block';
        setTimeout(function() {
            popup.style.display = 'none';
        }, 1500);
    }

    document.addEventListener('DOMContentLoaded', function() {
        if (document.querySelector('.sucesso')) {
            showPopup();
        }
    });
</script>
@endsection
