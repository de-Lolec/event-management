@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
  
<livewire:sidebar />


<!-- @section('title', 'AdminLTE') -->

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">You are logged in!</p>
                    <livewire:counter />
                    <x-adminlte-select name="selVehicle" label="Vehicle" label-class="text-lightblue" igroup-size="lg">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-car-side"></i>
                            </div>
                        </x-slot>
                        <option>Vehicle 1</option>
                        <option>Vehicle 2</option>
                    </x-adminlte-select>
                </div>
            </div>
        </div>
    </div>
@stop

@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop