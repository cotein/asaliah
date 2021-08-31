@extends('layouts.app.layout')
<link href="{{ asset('/css/app/messenger.min.css') }}" rel="stylesheet" type="text/css" >
@section('layout-content')
    <div class="row gutter-xs">
        <messages_pos_sale />
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

@section('scripts')
<script src="/js/messenger.min.js"></script>
@endsection
