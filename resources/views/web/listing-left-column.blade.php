@extends('layouts.web.layout-shop')

@section('main-content')
<div class="col-md-12 col-lg-9 col-xl-9">
	<div class="content-indent container-fluid-custom-mobile-padding-02">
		<div class="tt-filters-options">
			<search_results_info></search_results_info>
			<div class="tt-btn-toggle">
				<a href="#">FILTER</a>
			</div>
			<sort_products></sort_products>
			<div class="tt-quantity">
				<a href="#" class="tt-col-one" data-value="tt-col-one"></a>
				<a href="#" class="tt-col-two" data-value="tt-col-two"></a>
				<a href="#" class="tt-col-three" data-value="tt-col-three"></a>
				<a href="#" class="tt-col-four" data-value="tt-col-four"></a>
				<a href="#" class="tt-col-six" data-value="tt-col-six"></a>
			</div>
		</div>
		<wrapper_product></wrapper_product>
	</div>
</div>
@endsection

@section('javascript')
    {{-- <script src="external/jquery/jquery.min.js"></script>
	<script src="external/bootstrap/js/bootstrap.min.js"></script>
	<script src="{{ asset('js/app.js') }}"></script>
    <script src="external/slick/slick.min.js"></script>
	
    <script src="external/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="external/panelmenu/panelmenu.js"></script>
    <script src="external/countdown/jquery.plugin.min.js"></script>
    <script src="external/countdown/jquery.countdown.min.js"></script>
    <script src="external/lazyLoad/lazyload.min.js"></script>
    <script src="js/main.js"></script> --}}
    <!-- form validation and sending to mail -->
    {{--  <script src="external/form/jquery.form.js"></script>
    <script src="external/form/jquery.validate.min.js"></script>
    <script src="external/form/jquery.form-init.js"></script>  --}}
@endsection

@section('vue')
@endsection