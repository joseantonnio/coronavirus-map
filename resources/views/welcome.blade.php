@extends('layouts.default')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Visão Geral</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target=".modal-share"><span data-feather="share"></span> Compartilhar</button>
            </div>
        </div>
    </div>

    <div class="alert alert-primary" role="alert">
        <strong>O mapa agora é atualizado em tempo real com as informações enviadas pelos usuários</strong>, que são
        conferidas e atualizadas manualmente de duas a três vezes ao dia. Ajude você também o trabalho de atualização 
        <a href="{{ route('contribute.create') }}">enviando novos casos</a> em sua cidade ou região! A última 
        atualização foi em {{ $last_update }}.
    </div>

    <div id="coronamap"></div>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Sobre a COVID-19</h1>
    </div>

    <p>
        A COVID-19 é uma doença causada por um vírus da família dos <i>Coronaviridae</i>.
        Segundo a 
        <a href="https://www.who.int/news-room/q-a-detail/q-a-coronaviruses" target="_blank">
            Organização Mundial da Saúde (OMS)
        </a>, 
        os Coronavírus são uma grande família de vírus que podem causar doenças em animais ou humanos.
    </p>
    <p>
        Nos humanos, vários vírus dessa família causam infecções respiratórias que variam desde um resfriado comum a doenças mais graves, 
        como a Síndrome Respiratória do Oriente Médio (MERS) e a Síndrome Respiratória Aguda Grave (SARS).
    </p>
    <p>
        O coronavírus descoberto mais recentemente causa a doença COVID-19, que é a atual responsável pela pandemia 
        <a href="https://g1.globo.com/bemestar/coronavirus/noticia/2020/03/11/oms-declara-pandemia-de-coronavirus.ghtml" target="_blank">
            declarada pela própria OMS
        </a> no dia 11 de março de 2020.
    </p>
    <p>
        <strong>Você pode ter acesso a muitas informações sobre a doença como:</strong> prevenção do contágio, tratamento, 
        plano de contingência e muito mais acessando o 
        <a href="http://coronavirus.saude.gov.br/" target="_blank">
            portal do Ministério da Saúde
        </a> 
        sobre a COVID-19.
    </p>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">De onde vêm os dados contidos neste mapa?</h1>
    </div>

    <p>
        Os dados contidos neste mapa vêm de fontes confiáveis e públicas, como G1 Bem Estar, Abril Saúde, El País, 
        Estadão, entre outros. Também consultamos portais de notícia municipais, sempre prezando pela qualidade, 
        confiabilidade e validando a informação.
    </p>
    <p>
        Além disso, utilizamos ferramentas de dados para comparação, como Worldometer, Novel Coronavirus Situation da 
        Organização Mundial da Saúde, Plataforma IVIS do Ministério da Saúde e as tabelas com dados estaduais 
        atualizados diariamente no G1 Bem Estar.
    </p>
    <p>
        Outra origem de dados são os próprios usuários que utilizam a ferramenta através da seção "contribuir" no menu 
        lateral ou em nosso grupo no Telegram. Os dados enviados passam por uma verificação de qualidade e são aceitos 
        apenas se encaminhados com fontes sólidas e confiáveis, seguindo os mesmos critérios citados acima.
    </p>
    <p>
        Entretanto, você não deve ter os dados deste mapa como uma verdade absoluta. Utilize-os como uma de várias
        outras fontes confiáveis que buscam sempre se manter atualizadas e com informações coerentes.
    </p>

    @include('layouts.share')

    @include('layouts.news')
@endsection

@section('scripts')
<script src="{{ asset('js/map.js') }}"></script>
@endsection