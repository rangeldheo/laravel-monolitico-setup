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

    <div class="content"> 

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">OLá Munco</h5>
            </div>
            <div class="card-body">                
                 <div class="row">
                     <div class="col-md-2 mb-2">
                         <label class="alert alert-coffe w-100">Teste de cor</label>
                     </div>
                     <div class="col-md-2 mb-2">
                         <label class="alert alert-coffe-light w-100">Teste de cor</label>
                     </div>
                     <div class="col-md-2 mb-2">
                         <label class="alert alert-capuccino w-100">Teste de cor</label>
                     </div>
                     <div class="col-md-2 mb-2">
                         <label class="alert alert-capuccino-light w-100">Teste de cor</label>
                     </div>
                     <div class="col-md-2 mb-2">
                         <label class="alert alert-mocha w-100">Teste de cor</label>
                     </div>
                 </div>
            </div>
        </div>
    </div>
@endsection
