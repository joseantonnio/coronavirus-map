<div class="modal modal-share" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Compartilhar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="share">
                    <li class="twitter"><a href="https://twitter.com/intent/tweet?url={{ urlencode(env('APP_URL')) }}&text=Estou%20acompanhando%20todos%20os%20novos%20casos%20de%20%23COVID19%20no%20Brasil%20por%20esse%20mapa%20-%3E%20" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li class="facebook"><a href="https://www.facebook.com/dialog/share?app_id=340520026925462&href={{ urlencode(env('APP_URL')) }}&quote=Estou%20acompanhando%20todos%20os%20novos%20casos%20de%20%23COVID19%20no%20Brasil%20por%20esse%20mapa!" target="_blank"><i class="fab fa-facebook"></i></a></li>
                    <li class="whatsapp"><a href="https://web.whatsapp.com/send?text=Estou%20acompanhando%20todos%20os%20novos%20casos%20de%20%23COVID19%20no%20Brasil%20por%20esse%20mapa%20-%3E%20{{ urlencode(env('APP_URL')) }}" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>