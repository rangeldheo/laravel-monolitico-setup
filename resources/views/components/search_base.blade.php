<form class="form" action="{{ $routeForSearch }}" method="GET">
    @csrf
    @method('GET')
    <div class="row">
        <div class="col-md-4">
            <select name="filter[field]" class="form-control custom-select">
                @forelse($fieldsForFilter as $key=>$val)
                    <option value="{{ $val }}"
                        {{ !empty(Request::get('filter')['field']) && Request::get('filter')['field'] == $val ? 'selected': '' }}>
                        {{ $key }}
                    </option>
                @empty

                @endforelse
            </select>
        </div>
        <div class="col-md-4">
            <input class="form-control" name="filter[value]"
                value="{{ Request::get('filter')['value'] ?? '' }}"
                type="search" placeholder="Busca" aria-label="Busca">
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-block btn-success">
                Pesquisar
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</form>
