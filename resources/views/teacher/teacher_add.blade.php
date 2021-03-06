@extends('layouts.main')

@section('content-main')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Home</div>
        </div> 
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                href="{{url('home')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            @php
                $cont = 0;
            @endphp
            @foreach ($pages as $key => $page)
                
                @if (count($pages) >= 2 && $cont < (count($pages) - 1))
                    <li>&nbsp;<a class="parent-item"
                        href="{{url($key)}}">{{$page}}</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                @endif
               @php
                   $cont++; 
               @endphp
            @endforeach
            <li class="active">{{end($pages)}}</li>
        </ol>
    </div>
</div>

<!-- start row-->
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="card-head">
                <header>Basic Information</header>
				<button id="panel-button"
                        class="mdl-button mdl-js-button mdl-button--icon pull-right"
                        data-upgraded=",MaterialButton">
                        <i class="material-icons">more_vert</i>
				</button>
                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                    data-mdl-for="panel-button">
                    <li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
                    </li>
                    <li class="mdl-menu__item"><i class="material-icons">print</i>Another action
                    </li>
                    <li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
                        here</li>
                </ul>
            </div>
            <div class="card-body row">
                <div class="col-lg-7 p-t-20">
                    <div
                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                        <input class="mdl-textfield__input" type="text" id="txtFirstName">
                        <label class="mdl-textfield__label">Nome Completo</label>
                    </div>
                </div>
                <div class="col-lg-5 p-t-20">
                    <div
                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                        <input class="mdl-textfield__input" type="text" id="txtFirstName">
                        <label class="mdl-textfield__label">Documento</label>
                    </div>
                </div>
                <div class="col-lg-6 p-t-20">
                    <div
                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                        <input class="mdl-textfield__input" type="text" id="date">
                        <label class="mdl-textfield__label">Documento</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row-->
    
@endsection

@section('javascript')
<script src="{{asset('assets/js/pages/material-select/getmdl-select.js')}}"></script>
<script src="{{asset('assets/plugins/flatpicker/js/flatpicker.min.js')}}"></script>
<script src="{{asset('assets/js/pages/date-time/date-time.init.js')}}"></script>
@endsection