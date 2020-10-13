@php
    $id = tokenGenerate();
@endphp
<form id="form_{{ $id }}" class="{{ $class ?? 'form' }}" action="{{ $action }}"
    method="POST">

    @csrf
    @method('DELETE')

    <input type="submit" class="btn btn-sm btn-block btn-danger btn-delete-js" data-target="#form_{{ $id }}"
        value="{{ $value ?? 'Excluir' }}" />
</form>
@once
    @push('script')
        <script>
            $(function () {
                formDelete('.btn-delete-js');

                function formDelete(btnDelete) {
                    var trigger = btnDelete;
                    var observer = 'body';

                    $(observer).delegate(trigger, 'click', function (event) {
                        event.preventDefault();
                        var form = $(this).attr('data-target');                        
                        Swal.fire({
                            title: 'Tem certeza que deseja excluir esse registro',
                            showCancelButton: true,
                            confirmButtonText: 'Sim',
                            cancelButtonText: 'Não',
                        }).then((result) => {
                            if (result.value == true) {
                                $(form).submit();                                
                            } else {
                                return false;
                            }
                        })
                    });
                }

            });

        </script>
    @endpush
@endonce
