@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

{{-- @section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData()) --}}

@section('body')
<div class="wrapper">
  <livewire:sidebar />
  <div class="content-wrapper" style="min-height: 1604.19px;">
    {{-- <livewire:header :event="$event"/> --}}
    @if(isset($event))
    {{-- @dd($event) --}}
      <livewire:content :event="$event"/>
    @else
      <p>Пусто</p>
    @endif
  </div>
</div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop

{{-- @section('title', 'Dashboard') --}}

{{-- @section('content_header')
    <h1>Dashboard</h1>
@stop --}}


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop