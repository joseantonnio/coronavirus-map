<?php 
    $title = "Colaboradores - Mapa do Coronavírus no Brasil";
    $description = "Dedicamos essa página para todos e todas que ajudaram ou ajudam o mapa com atualização de informações ou doações.";
?>

@extends('layouts.default')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Colaboradores</h1>
</div>

<p>Os principais colaboradores são os <strong>doadores</strong>, que ajudam ou ajudaram com os custos para manter este serviço:</p>

<ul>
    <li><a href="{{ route('coffee') }}">Seja um doador e ajude a manter o mapa on-line!</a></li>
</ul>

<p>Um <strong>muito obrigado</strong> especial a todos os usuários que contribuíram com os dados do mapa! Aqui estão os nomes todos:</p>

<ul>
    <li>Denis Augusto de Araujo</li>
    <li>Igor Rozani</li>
    <li>Jefferson Gomes de Oliveira</li>
    <li>Pietro Vianelo Magalhães</li>
    <li>Rodrigo Borges</li>
    <li>Luccas Erickson de Oliveira Marinho</li>
    <li>Bruno Giubilei</li>
    <li>Felipe Felisberto de Souza</li>
    <li>Eric Carvalho</li>
    <li>Darci Neto</li>
    <li>Eduardo Souza</li>
    <li>Ranielsyn S.</li>
    <li>Jefferson Gomes de Oliveira</li>
    <li>Crystian Soares</li>
    <li>Pietro Vianelo Magalhães</li>
    <li>Gabriel Machado</li>
    <li>DANIEL Kobayashi COLOMBO</li>
    <li>Saulo Araujo de pontes</li>
    @foreach ($contributors as $contributor)
        <li>{{ $contributor->name }}</li>
    @endforeach
</ul>

<p>E também nosso agradecimentos aos editores, que ajudaram esse projeto acontecer:</p>

<ul>
    <li>José Antonio, desenvolvedor e atualização de casos</li>
    <li>Victória Xavier, conteúdo e atualização de casos</li>
</ul>
@endsection