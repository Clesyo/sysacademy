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
            @foreach ($pages as $key => $page)
                @if (count($pages) >= 2)
                    <li>&nbsp;<a class="parent-item"
                        href="{{url($key)}}">{{$page}}</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                @endif
               
            @endforeach
            <li class="active">{{end($pages)}}</li>
        </ol>
    </div>
</div>
    
@endsection