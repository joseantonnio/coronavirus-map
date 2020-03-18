<?php 
    $title = "Tabela de Dados - Mapa do Coronavírus no Brasil";
    $description = "Confira todas as informações contidas no Mapa do Coronavírus no Brasil em uma tabela para uma visualização mais limpa dos dados!"
?>

@extends('layouts.default')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tabelas de Dados</h1>
    </div>

    <div class="table-responsive pt-3 pb-2 mb-3">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th colspan="6" class="text-center">Informações por Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-secondary text-white">
                    <td>Estado</td>
                    <td>UF</td>
                    <td>Casos</td>
                    <td>Casos Graves (UTI)</td>
                    <td>Recuperados</td>
                    <td>Mortes</td>
                </tr>
                @if ($states->count() < 1)
                    <tr>
                        <td class="text-center" colspan="6">Não há dados para serem exibidos...</td>
                    </tr>
                @endif

                @foreach ($states as $state)
                    <tr>
                        <td>{{ $state->name }}</td>
                        <td>{{ $state->uf }}</td>
                        <td>{{ is_null($state->total_cases) ? 0 : $state->total_cases }}</td>
                        <td>{{ is_null($state->total_serious) ? 0 : $state->total_serious }}</td>
                        <td>{{ is_null($state->total_recovered) ? 0 : $state->total_recovered }}</td>
                        <td>{{ is_null($state->total_deaths) ? 0 : $state->total_deaths }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="bg-secondary text-white">
                    <td colspan="2"></td>
                    <td>{{ $states->sum('total_cases') }}</td>
                    <td>{{ $states->sum('total_serious') }}</td>
                    <td>{{ $states->sum('total_recovered') }}</td>
                    <td>{{ $states->sum('total_deaths') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="table-responsive pt-3 pb-2 mb-3">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th colspan="6" class="text-center">Informações por Município</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-secondary text-white">
                    <td>Cidade</td>
                    <td>Casos</td>
                    <td>Casos Graves (UTI)</td>
                    <td>Recuperados</td>
                    <td>Mortes</td>
                    <td>Data do Primeiro Caso</td>
                </tr>
                @if ($infections->count() < 1)
                    <tr>
                        <td class="text-center" colspan="6">Não há dados para serem exibidos...</td>
                    </tr>
                @endif

                @foreach ($infections as $infection)
                    <tr>
                        <td>{{ $infection->city->name . ', ' . $infection->city->state->uf }}</td>
                        <td>{{ $infection->cases }}</td>
                        <td>{{ $infection->serious }}</td>
                        <td>{{ $infection->recovered }}</td>
                        <td>{{ $infection->deaths }}</td>
                        <td>{{ $infection->first_case->translatedFormat('d \d\e F \d\e Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="bg-secondary text-white">
                    <td></td>
                    <td>{{ $infections->sum('cases') }}</td>
                    <td>{{ $infections->sum('serious') }}</td>
                    <td>{{ $infections->sum('recovered') }}</td>
                    <td>{{ $infections->sum('deaths') }}</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection