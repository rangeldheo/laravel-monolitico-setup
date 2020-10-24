@extends('components.form_base',[
'title' => $title ?? 'Você não informou um título pare essa tela',
'class'=>'form-ajax',
'action'=>$action,
'form_method'=>$form_method ?? 'POST',
'request_method' => $request_method ?? 'POST',
'ir_para' => $ir_para ?? null,
'cadastrar_novo' => $cadastrar_novo ?? null,
])
{{------------------------------------------------------------------------------ 
    O componente formulario ajax carregar varios arquivos js que possibilitam
    as ações assíncronas de requisição e resposta pelos formulários marcado
    com a classe '.form_ajax'
------------------------------------------------------------------------------}}
@once
    @push('script')
        <script src="{{ asset('js/form_ajax.js') }}"></script>
        <script src="{{ asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}">
        </script>
        <script
            src="{{ asset('adminlte/plugins/jquery-validation/additional-methods.min.js') }}">
        </script>
        <script
            src="{{ asset('adminlte/plugins/jquery-validation/localization/messages_pt_BR.min.js') }}">
        </script>
        <script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
        <script
            src="{{ asset('adminlte/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}">
        </script>
        <script>
            $(function () {
                formAjax();
            });

        </script>
    @endpush
@endonce
