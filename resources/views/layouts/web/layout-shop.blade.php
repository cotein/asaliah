<!DOCTYPE html> {{-- /Tienda --}}
<html lang="en">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-164132632-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-164132632-1');
	</script>

	<meta charset="utf-8">
	<title>{{config('app.name')}}</title>
	<meta name="keywords" content="HTML5 Template">
	<meta name="description" content="Wokiee - Responsive HTML5 Template">
	<meta name="author" content="wokiee">
	<link rel="shortcut icon" href="/images/logos/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="/css/theme.css">
</head>
<body>
	<div id="app">
		@if (\Request::is('tienda'))
			<div id="loader-wrapper">
				<div id="loader">
					<div class="dot"></div>
					<div class="dot"></div>
					<div class="dot"></div>
					<div class="dot"></div>
					<div class="dot"></div>
					<div class="dot"></div>
					<div class="dot"></div>
				</div>
			</div>
		@endif
		<header>
			<!-- tt-mobile menu -->
			@include('layouts.web.partials.mobile-menu')

			<!-- tt-mobile-header -->
			@include('layouts.web.partials.mobile-header')
			
			<!-- tt-desktop-header -->
			@include('layouts.web.partials.desktop-header')

			<!-- stuck nav -->
			<div class="tt-stuck-nav">
				<div class="container">
					<div class="tt-header-row">
						<div class="tt-stuck-parent-menu"></div>
						<div class="tt-stuck-parent-search tt-parent-box"></div>
						<div class="tt-stuck-parent-cart tt-parent-box"></div>
						<div class="tt-stuck-parent-account tt-parent-box"></div>
						<div class="tt-stuck-parent-multi tt-parent-box"></div>
					</div>
				</div>
			</div>
		</header>
		<div class="tt-breadcrumb">
			<div class="container">
				<ul>
					<li><a href="/tienda">Home</a></li>
					<li>Listing - wwww</li>
				</ul>
			</div>
		</div>
		<div id="tt-pageContent" style="min-height:500px">
			@if (\Request::is('tienda'))
				<div class="container-indent">
					<div class="container">
						<div class="row">
							@include('layouts.web.partials.left-column')
							@yield('main-content')
						</div>
					</div>
				</div>
			@else
				@yield('main-content')
			@endif
			
		</div>
		<footer>
			@include('layouts.web.partials.footer')
		</footer>
		<a href="#" class="tt-back-to-top">BACK TO TOP</a>
		<!-- modal (AddToCartProduct) -->
		<div class="modal  fade"  id="modalAddToCartProduct" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
			@include('layouts.web.partials.modal-add-to-cart-product')
		</div>
		<!-- modal (quickViewModal) -->
		<div class="modal  fade"  id="ModalquickView" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
			@include('layouts.web.partials.modal-quick-view')
		</div>
		<!-- modalVideoProduct -->
		<div class="modal fade"  id="modalVideoProduct" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-video">
				<div class="modal-content ">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
					</div>
					<div class="modal-body">
						<div class="modal-video-content">

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- modal (ModalSubsribeGood) -->
		<div class="modal  fade"  id="ModalSubsribeGood" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xs">
				<div class="modal-content ">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
					</div>
					<div class="modal-body">
						<div class="tt-modal-subsribe-good">
							<i class="icon-f-68"></i> You have successfully signed!
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@if (\Request::is('tienda'))
		<script src="/external/jquery/jquery.min.js"></script>
		<script src="/external/bootstrap/js/bootstrap.min.js"></script>
		<script src="/js/app.js"></script>
		<script src="/external/slick/slick.min.js"></script>
		<script src="/external/panelmenu/panelmenu.js"></script>
		<script src="/external/countdown/jquery.plugin.min.js"></script>
		<script src="/external/countdown/jquery.countdown.min.js"></script>
		<script src="/external/lazyLoad/lazyload.min.js"></script>
		<script src="/js/main.js"></script>
		<!-- form validation and sending to mail -->
		{{-- <script src="/external/form/jquery.form.js"></script>
		<script src="/external/form/jquery.validate.min.js"></script>
		<script src="/external/form/jquery.form-init.js"></script> --}}
	@else
		@yield('scripts')
	@endif
</body>
</html>