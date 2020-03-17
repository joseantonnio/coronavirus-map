@extends('layouts.default')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Enviar correção ou atualização</h1>
</div>

<p>
    Os campos com asterisco (*) são obrigatórios!
</p>

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {{ __($error) }}<br />
        @endforeach
    </div>
@endif

@if (isset($success) && $success)
    <div class="alert alert-success">
        <ul>
            Sua contribuição foi enviada com sucesso. Muito obrigado!
        </ul>
    </div>
@endif

<form action="/contribute" method="POST">
    @csrf
    <input type="hidden" name="infection_id" id="infection_id">
    <input type="hidden" name="recaptcha_response" id="recaptcha_response">

    <div class="row">
        <div class="form-group col-12">
            <label for="name">Nome *</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nome completo, primeiro nome ou apelido" required>
            <small id="nameHelp" class="form-text text-muted">Será adicionado nos créditos do site</small>
        </div>
        
        <div class="form-group col-12">
            <label for="city">Cidade que deseja corrigir *</label>
            <input type="text" class="form-control" name="city" id="city" placeholder="Ex. São Paulo, SP" required>
        </div>

        <div class="form-group col-md-4 col-sm-6">
            <label for="cases">Casos *</label>
            <input type="number" min="0" class="form-control" name="cases" id="cases" value="0" disabled required>
        </div>

        <div class="form-group col-md-4 col-sm-6">
            <label for="serious">Casos Graves (UTI) *</label>
            <input type="number" min="0" class="form-control" name="serious" id="serious" value="0" disabled required>
        </div>

        <div class="form-group col-md-4 col-sm-6">
            <label for="deaths">Mortes *</label>
            <input type="number" min="0" class="form-control" name="deaths" id="deaths" value="0" disabled required>
        </div>

        <div class="form-group col-md-4 col-sm-6">
            <label for="recovered">Recuperações *</label>
            <input type="number" min="0" class="form-control" name="recovered" id="recovered" value="0" disabled required>
        </div>

        <div class="form-group col-md-8 col-sm-12">
            <label for="first_case">Primeiro Caso *</label>
            <input type="date" min="0" class="form-control" name="first_case" id="first_case" value="" disabled required>
        </div>

        <div class="form-group col-12">
            <label for="sources">Fontes *</label>
            <textarea class="form-control" name="sources" id="sources" rows="6" placeholder="https://exemplo1.com.br/noticia&#10;https://exemplo2.com/noticia" disabled required></textarea>
            <small id="nameHelp" class="form-text text-muted">Quanto mais fontes sua contribuição tiver, mais credibilidade ela terá! 
                As fontes serão analisadas ou contatadas.
            </small>
        </div>

        <div class="form-group col-6 my-3">
            <button type="submit" class="btn btn-primary" id="send" disabled>Enviar contribuição</button>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script src="https://www.google.com/recaptcha/api.js?render=6LeRzeEUAAAAAHSqv2f7crqwzUNyyxJGYl-wQ6Vc"></script>
<script>
grecaptcha.ready(function() {
    grecaptcha.execute('6LeRzeEUAAAAAHSqv2f7crqwzUNyyxJGYl-wQ6Vc', {action: 'homepage'}).then(function (token) {
        var recaptchaResponse = document.getElementById('recaptcha_response');
        recaptchaResponse.value = token;
    });
});
</script>

<script src="{{ asset('js/contribute.js') }}"></script>
@endsection