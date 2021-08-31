@extends('layouts.app.layout')

@section('layout-content')
    <div class="row gutter-xs">
        <payment_list token="{{Auth::user()->token}}"></payment_list>
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

