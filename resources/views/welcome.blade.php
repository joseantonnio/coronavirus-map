@extends('layouts.default')

@section('content')
    <div class="d-flex justify-content-center justify-content-sm-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3">
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group">
                <a href="#" class="btn btn-sm btn-outline-primary"><span data-feather="plus"></span> Contribuir</a>
                <button type="button" class="btn btn-sm btn-outline-info" data-toggle="collapse" href="#collapseStats" role="button" aria-expanded="false" aria-controls="collapseStats"><span data-feather="activity"></span> Estatísticas</button>
            </div>
        </div>

        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-dark" data-toggle="modal" data-target=".modal-share"><span data-feather="share"></span> Compartilhar</button>
            </div>
        </div>
    </div>

    <div class="row mb-3 collapse" id="collapseStats">
        <div class="col-lg-3 col-md-6">
            <div class="stati bg-sun_flower">
                <i class="fas fa-diagnoses fa-2x"></i>
                <div>
                    <b>{{ $infections->total_cases }}</b>
                    <span class="small">Confirmados</span>
                </div> 
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="stati bg-carrot">
                <i class="fas fa-procedures fa-2x"></i>
                <div>
                    <b>{{ $infections->total_serious }}</b>
                    <span class="small">Graves</span>
                </div> 
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="stati bg-nephritis">
                <i class="fas fa-heartbeat fa-2x"></i>
                <div>
                    <b>{{ $infections->total_recovered }}</b>
                    <span class="small">Recuperados</span>
                </div> 
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="stati bg-pomegranate">
                <i class="fas fa-cross fa-2x"></i>
                <div>
                    <b>{{ $infections->total_deaths }}</b>
                    <span class="small">Mortes</span>
                </div> 
            </div>
        </div>
        <div class="col-12 text-right">
            <span class="text-muted small">Última atualização em {{ $last_update }}</span>
        </div>
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