@extends('layouts.app')
@section('content')
    @include('components.nav_bar_base')
    @include('components.menu_base')
    <div class="content-wrapper p-3">
        @yield('main-content')
    </div>
    @include('components.footer_base')
@endsection
