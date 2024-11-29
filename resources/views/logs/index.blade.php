@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Logs de Candidatos</h1>

    @if ($message)
    <div class="alert alert-warning">{{ $message }}</div>
    @endif

    @if (count($logs) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Ação</th>
                <th>Detalhes</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $index => $log)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    @if (str_contains($log, 'criado'))
                    Criado
                    @elseif (str_contains($log, 'atualizado'))
                    Atualizado
                    @elseif (str_contains($log, 'excluído'))
                    Excluído
                    @else
                    Outra
                    @endif
                </td>
                <td>{{ $log }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @else
    <p class="text-center">Nenhum log disponível para exibir.</p>
    @endif
</div>
@endsection