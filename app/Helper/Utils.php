<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

if (!function_exists('tokenGenerate')) {
    /**
     * Retorna um token unico
     *
     * @return string
     */
    function tokenGenerate(): string
    {
        return uniqid(md5(date('Y-m-d H:i:s') . config('app.name')));
    }
}

if (!function_exists('paginateParametersForSearchs')) {
    /**
     * Retorna os parametros da URL 
     *
     * @return string|null
     */
    function parametersForSearchs(): ?string
    {
        if (!empty(Request::get('filter')['field']) && !empty(Request::get('filter')['value'])) {
            $filter = Request::get('filter');
            return "&filter[field]={$filter['field']}&filter[value]={$filter['value']}";
        }
        return null;
    }
}

if (!function_exists('numeric')) {
    /**
     *Remove os caracteres e deixa somente numeros
     *
     * @param [mix] $value
     * @return void
     */
    function numeric($value)
    {
        return preg_replace("/[^0-9]/", "", $value);
    }
}

if (!function_exists('errorDefault')) {
    /**
     * Retorna um array com uma msg de erro padrão
     *
     * @param [string] $msg
     * @return array
     */
    function errorDefaultResponse($msg = null): array
    {
        return [
            'action'   => false,
            'feedback' => [
                'title' => 'Oops',
                'text' => $msg ?? 'Não foi possível realizar esse cadastro',
            ],
        ];
    }
}

if (!function_exists('successDefault')) {
    /**
     * Retorna uma mensagme de sucesso padrao
     *
     * @param [string] $field => campo que o ajax vai tratar
     * as oppçoes de campos são:;
     * 
     * redirect     : caminho que o cliente sera redirecionado em cado de sucesso
     * reload       : recarregar a página ao final da acão
     * clear_form   : limpa os campos do formulário 
     * remove_form  : remove o formulário que chamou o ajax
     * block_submit : bloqueia o submit do formulário após o retorno do ajax
     * 
     * @param [mix] $value    => valor do campo que o ajax vai tratar
     * @param [string] $successMsg => msg que o ajax vai apresentar ao usuário
     * @return array
     */
    function successDefaultResponse($field, $value, $successMsg = null): array
    {
        return [
            'action'   => true,
            'feedback' => [
                'title' => 'Tudo certo',
                'text' => $successMsg ?? 'Cadastro realizado com sucesso!',
            ],
            $field => $value
        ];
    }
}