@extends('layouts.app.layout')

@section('layout-content')
    <div class="row gutter-xs">
        {{-- <publication_list token="{{Auth::user()->token}}"></publication_list> --}}
        {{$meli_id}}
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

