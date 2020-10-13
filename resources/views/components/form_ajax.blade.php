@extends('components.form_base',['class'=>'form-ajax'])
@once
    @push('script')
    <script src="{{ asset('js/form_ajax.js') }}"></script>
        <script>     
            $(function(){
                formAjax();
            });       
        </script>
    @endpush
@endonce
