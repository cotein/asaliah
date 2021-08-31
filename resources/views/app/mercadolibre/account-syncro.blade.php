@extends('layouts.app.layout')

@section('layout-content')
    <div class="row">
            <!-- <publication_total token="{{Auth::user()->token}}"></publication_total> -->
            <account_syncro ></account_syncro>
    </div><!-- /.row  -->
@endsection

@section('layout-footer')
    <div class="layout-footer">
        <div class="layout-footer-body">
            <small class="version">{{config('app_data.version')}}</small>
            <small class="copyright">© DAB </small>
        </div>
    </div>
@endsection

