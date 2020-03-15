@include('layouts.header')

<main role="main" class="col-md-9 col-lg-10 ml-sm-auto px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Visão Geral</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target=".modal-share"><span data-feather="share"></span> Compartilhar</button>
            </div>
        </div>
    </div>

    <?php if (isset($_GET['donate']) && $_GET['donate'] == 'completed') : ?>
        <div class="alert alert-success" role="alert">
            <img src="https://media.giphy.com/media/xUOwG5aFxxcLTVCaeQ/source.gif" height="80px" />
            <strong>Delícia!!!</strong> Muito obrigado pelo copão café forte e quente. Você fez um desenvolvedor muito mais feliz hoje!
        </div>
    <?php elseif (isset($_GET['donate']) && $_GET['donate'] == 'cancel') : ?>
        <div class="alert alert-danger" role="alert">
            <img src="https://media.giphy.com/media/JreLOq5hxba4wYV0Jj/giphy.gif" height="80px" />
            <strong>Que pena!</strong> Você iria deixar um desenvolvedor muito feliz com aquele cafézinho...
        </div>
    <?php endif; ?>

    <div id="coronamap"></div>
</main>

@include('layouts.share')

@include('layouts.news')

@include('layouts.footer')