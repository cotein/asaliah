@extends('layouts.app.layout')

@section('layout-content')
    <div class="row gutter-xs">
        <orders_list token="{{Auth::user()->token}}"></orders_list>
    </div><!-- /.row .gutter-xs -->
    
@endsection

@section('layout-footer')
    <div class="layout-footer">
        <div class="layout-footer-body">
            <small class="version">{{config('app_data.version')}}</small>
            <small class="copyright">© DAB </small>
        </div>
    </div>
@endsection

