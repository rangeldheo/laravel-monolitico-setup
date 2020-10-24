{{-- Se na url houver um parametro feedback o alerta será exibida --}}
{{-- Ex.: http://www.site.com?feeback=Essa + frase + será + exibida + dentro + do + alerta --}}
@if(!empty(Request::get('feedback')))
    <div class="alert alert-{{ $type ?? 'dark' }} alert-dismissible fade show"
        role="alert">
        <strong>{{ Request::get('feedback') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @once
        @push('script')
            <script>
                $(function () {
                    //Habilita o clieck no botao de fechar o alerta
                    $('.alert').alert()
                });

            </script>
        @endpush
    @endonce
@endif
