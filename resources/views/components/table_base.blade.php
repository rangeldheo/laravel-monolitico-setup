{{-- componente alert --}}
@component('components.alert_base',[
    'type'=>'dark'
    ])

@endcomponent
{{-- fim:componente alert --}}

<div class="card shadow">

    {{-- Cabeçalho da tabela --}}
    <div class="card-header">
        <div class="row">
            <div class="col-md-4 mb-2">
                <button type="button" class="btn btn-dark btn-block">
                    {{ $title ?? 'Você não informou um título pare essa tela' }}
                    <span class="badge badge-light">
                        {{ $paginate->total() ?? 0 }}
                    </span>
                </button>
            </div>
            <div class="col-md-8 mb-2">
                <div class="row">
                    <div class="col-md-8 mb-2">
                        {{-- componente de busca --}}
                        @component('components.search_base',[
                            'routeForSearch' => $routeForSearch ?? '#',
                            'fieldsForFilter'=> $fieldsForFilter ?? [],
                            ])
                        @endcomponent
                        {{-- componente de busca --}}
                    </div>
                    <div class="col-md-4 mb-2">
                        <a href="{{ $routeCreate }}" class="btn btn-block btn-outline-success">Novo + </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- fim: Cabeçalho da tabela --}}

    <div class="card-body pb-0">
        <div class="table-responsive rounded-top">
            {{-- HTML da tabela --}}
            <table class="table {{ $class ?? 'table-light' }} table-hover mb-0">
                <thead class="thead-light">
                    <tr>
                        @foreach($thead as $head)
                            <th>{{ $head }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="small">
                    {{ $body_content ?? '' }}
                </tbody>
            </table>
            {{-- HTML da tabela --}}
        </div>
    </div>

    @if(!empty($paginate) && $paginate->count() > 0)
        <div class="card-footer">
            {{-- componente de paginacao --}}
            @component('components.pagination',[
                'pag'=>$paginate
                ])
            @endcomponent
            {{-- end paginacao --}}
        </div>
    @endif
</div>
