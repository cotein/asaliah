@extends('layouts.app.layout')

@section('layout-content')
    <div class="row gutter-xs">
        <wrapper_order token="{{Auth::user()->token}}"></wrapper_order>
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

