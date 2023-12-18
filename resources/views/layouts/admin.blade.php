@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('body')
<div class="wrapper">
  <livewire:sidebar />
  <div class="content-wrapper" style="min-height: 1604.19px;">
    @if(isset($event))
      <livewire:content :event="$event"/>
    @else
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-4 ml-3">
                    <h2>Выберите событие</h2>
                </div>
            </div>
        </div>
    @endif
  </div>
</div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
