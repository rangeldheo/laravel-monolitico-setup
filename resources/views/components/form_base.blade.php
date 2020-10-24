<form class="{{ $class ?? 'form' }}" action="{{ $action }}" method="{{ $form_method }}">
    <div class="card shadow">
        {{-- Cabeçalho da tabela --}}
        <div class="card-header">
            <h5>{{ $title ?? 'Você não informou um título pare essa tela' }}
            </h5>
        </div>
        <div class="card-body">

            @csrf
            @method($request_method)

            {{ $form_content }}

        </div>
        <div class="card-footer">
            <div class="row">

                {{-- botao submit padrão --}}
                <div class="col-md-4">
                    <input type="submit"
                        class="btn btn-sm btn-block {{ $btn_class ?? 'btn-success' }}"
                        value="{{ $value ?? 'Salvar' }}" />
                </div>
                {{-- botao submit padrão --}}

                {{-- botao de voltar opcional:opcional --}}
                @if(!empty($ir_para))
                    <div class="col-md-4 mb-2">
                        <a href="{{ $ir_para }}" class="btn btn-sm btn-block btn-outline-info"
                            title="Deseja cria um novo cliente? Clique aqui">Voltar</a>
                    </div>
                @endif
                {{-- botao de voltar --}}

                {{-- botao para iniciar um novo cadastro: opcional --}}
                @if(!empty($cadastrar_novo))
                    <div class="col-md-4 mb-2">
                        <a href="{{ $cadastrar_novo }}" class="btn btn-sm btn-block btn-outline-success"
                            title="Deseja cria um novo cliente? Clique aqui">Novo + </a>
                    </div>
                @endif
                {{-- botao para iniciar um novo cadastro --}}
            </div>
        </div>
        <div class="overlay dark d-none load-js">
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
        </div>
    </div>
</form>
