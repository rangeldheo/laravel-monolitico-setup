@extends('layouts.base')
@section('main-content')
    @section('menu-content')
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            Olá mundo
        </a>
    </li>
    @endsection
    @component('components.form_delete',['action'=>'/2'])
    @endcomponent

@endsection
