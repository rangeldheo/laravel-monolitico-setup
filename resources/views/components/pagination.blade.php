@if($pag->count() > 0)
    <nav aria-label="Paginação de resultados">
        <ul class="pagination pagination-sm">

            {{-- Quando não houver mais páginas anteriores remove esse controle --}}
            @if(!empty($pag->previousPageUrl()))
                <li class="page-item"><a class="page-link"
                        href="{{ $pag->previousPageUrl() }}{{ parametersForSearchs() }}">Anterior</a></li>
            @endif

            {{-- Gerando as páginas --}}
            @for($i = 1; $i <= $pag->lastPage(); $i++)
                <li
                    class="page-item {{ ($pag->currentPage() == $i) ? 'active':'' }}">
                    <a class="page-link" href="{{ $pag->url($i) }}{{ parametersForSearchs() }}">{{ $i }}</a>
                </li>
            @endfor
            {{-- Gerando as páginas --}}

            {{-- Quando não houver mais proximas páginas remove esse controle --}}
            @if(!empty($pag->nextPageUrl()))
                <li class="page-item"><a class="page-link"
                        href="{{ $pag->nextPageUrl() }}{{ parametersForSearchs() }}">Próximo</a></li>
            @endif

        </ul>
    </nav>
    @once
        @push('script')
            <script src="{{ asset('js/responsive-paginate.js') }}"></script>
            <script>
                $(function ($) {
                    //reorganiza a paginação mobile
                    $(".pagination").rPage();
                });

            </script>
        @endpush
    @endonce
@endif
