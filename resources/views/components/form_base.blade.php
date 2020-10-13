<form class="{{ $class ?? 'form' }}" action="{{ $action }}" method="{{ $form_method }}">
    <div class="card">
        <div class="card-body">

            @csrf
            @method($request_method)

            {{ $form_content }}

        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-4">
                    <input type="submit" class="btn btn-sm btn-block {{ $btn_class ?? 'btn-success' }}"
                        value="{{ $value ?? 'Salvar' }}" />
                </div>
            </div>
        </div>
        <div class="overlay dark d-none load-js">
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
        </div>
    </div>
</form>