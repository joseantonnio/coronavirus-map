@include('layouts.header')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="text-center pt-3 pb-2 mb-3">
        <h1 class="h2">Obrigado!!!</h1>
        <img src="https://media.giphy.com/media/xUOwG5aFxxcLTVCaeQ/source.gif" class="my-5" />
        <p>Muito obrigado pelo copão café forte e quente. Você fez um desenvolvedor muito mais feliz hoje!</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Voltar ao mapa</a>
    </div>
</main>

@include('layouts.footer')