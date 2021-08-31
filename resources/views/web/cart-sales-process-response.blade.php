@extends('layouts.web.layout-shop')

@section('main-content')
    <cart_sales_process_response order="{{ json_encode($order) }}"></cart_sales_process_response>
@endsection

@section('scripts')
    <script src="/external/jquery/jquery.min.js"></script>
    <script src="/external/bootstrap/js/bootstrap.min.js"></script>
	<script src="/js/app.js"></script>
    <script src="/external/elevatezoom/jquery.elevatezoom.js"></script>
    <script src="/external/slick/slick.min.js"></script>
    <script src="/external/panelmenu/panelmenu.js"></script>
    <script src="/external/air-sticky/air-sticky-block.min.js"></script>
    <script src="/external/lazyLoad/lazyload.min.js"></script>
	<script src="/js/main.js"></script>
@endsection

@section('vue')
@endsection