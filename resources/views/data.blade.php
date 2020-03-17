@extends('layouts.default')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tabela de Dados</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target=".modal-share"><span data-feather="share"></span> Compartilhar</button>
            </div>
        </div>
    </div>

    <div class="table-responsive pt-3 pb-2 mb-3">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Cidade</th>
                    <th scope="col">Casos</th>
                    <th scope="col">Casos Graves (UTI)</th>
                    <th scope="col">Recuperados</th>
                    <th scope="col">Mortes</th>
                    <th scope="col">Data do Primeiro Caso</th>
                </tr>
            </thead>
            <tbody>
                @if ($data->count() < 1)
                    <tr>
                        <td class="text-center" colspan="6">Não há dados para serem exibidos...</td>
                    </tr>
                @endif

                @foreach ($data as $infection)
                    <tr>
                        <td>{{ $infection[0] }}</td>
                        <td>{{ $infection[1] }}</td>
                        <td>{{ $infection[2] }}</td>
                        <td>{{ $infection[3] }}</td>
                        <td>{{ $infection[4] }}</td>
                        <td>{{ $infection[5] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection