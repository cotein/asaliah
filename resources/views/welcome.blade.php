@extends('layouts.web.layout-landing')

@section('main-content')
<div id="tt-pageContent">
	{{-- <fetchdata></fetchdata> --}}
	<div class="container-indent nomargin">

	<div class="tp-caption1-wd-3 tt-red-color">¡PÁGINA EN CONSTRUCCIÓN... EN BREVE NOS ENCONTRARÁS POR AQUÍ!  Acérquese por consultas o comuníquese telefónicamente o por Whatsapp. info@asaliah.com.ar</div>

<div class="container-fluid">
			<div class="row">
				<div class="slider-revolution revolution-default">
					<div class="tp-banner-container">
						<div class="tp-banner revolution">
							<ul>
								<main_slide></main_slide>
								<li data-thumb="images/slides/08/slide-02.jpg" data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
									<img src="images/slides/08/slide-02.jpg"  alt="slide1"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" >
									<div class="tp-caption tp-caption1 lft stb"
										data-x="center"
										data-y="center"
										data-hoffset="0"
										data-voffset="0"
										data-speed="600"
										data-start="900"
										data-easing="Power4.easeOut"
										data-endeasing="Power4.easeIn">
										<div class="tp-caption1-wd-1 tt-white-color">Descuentos en</div>
										<div class="tp-caption1-wd-2 tt-base-color">Ventas al<br>por Mayor</div>
										<div class="tp-caption1-wd-3 tt-white-color">Consúltenos por WhatsApp, o acérquese a nuestro local y encontrará el mejor precio y calidad.</div>
										<div class="tp-caption1-wd-4"><a href="/tienda" class="btn btn-xl" data-text="IR A LA TIENDA">IR A LA TIENDA</a></div>
										</br>

									</div>
								</li>
								<li data-thumb="/images/slides/08/slide-03.jpg" data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
									<img src="images/slides/08/slide-03.jpg"  alt="slide1"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" >
									<div class="tp-caption tp-caption1 lft stb"
										data-x="center"
										data-y="center"
										data-hoffset="0"
										data-voffset="0"
										data-speed="600"
										data-start="900"
										data-easing="Power4.easeOut"
										data-endeasing="Power4.easeIn">
										<div class="tp-caption1-wd-1 tt-white-color">Productos Metalúrgicos</div>
										<div class="tp-caption1-wd-2 tt-white-color">Hierros<br>Chapas - Perfiles</div>
										<div class="tp-caption1-wd-3 tt-white-color">Herramientas y demás insumos, para la construcción</div>
										<div class="tp-caption1-wd-4"><a href="/tienda" class="btn btn-xl" data-text="IR A LA TIENDA">IR A LA TIENDA</a></div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-indent">
		<div class="container">
			<div class="tt-block-title">
				<h1 class="tt-title">BIEVENIDO!</h1>
{{--  				<div class="tt-description">ABOUT OUR STORE</div>
  --}}			</div>
			<div class="tt-text-box01">
				Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.
			</div>
		</div>
	</div>
	{{-- <div class="container-indent">
		<div class="container container-fluid-custom-mobile-padding">
			<ul class="nav nav-tabs tt-tabs-default" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="/">CATALOGO</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#tt-tab01-02">SPECIALS</a>
				</li> 
				  <li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#tt-tab01-03">BESTSELLERS</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#tt-tab01-04">MOST VIEWED</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#tt-tab01-05">FEATURED PRODUCTS</a>
				</li>  
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tt-tab01-01" v-if="$store.state.products.products_loading">
						<span class="tt-img"><img src="images/loader.svg" data-src="images/loader.svg" alt=""></span>
				</div>
				
			</div>
		</div>
	</div> --}}

	<wrapper_category_box_component></wrapper_category_box_component>
	{{-- <div class="container-indent">
		<div class="container">
			<div class="tt-block-title">
				<h2 class="tt-title"><a href="https://www.instagram.com/wokieeshop/">@ FOLLOW</a> US ON</h2>
				<div class="tt-description">INSTAGRAM</div>
			</div>
			<div id="instafeed" class="instafeed-col"
					data-accessToken="8626857013.dd09515.0fcd8351c65140d48f5a340693af1c3f"
					data-clientId="dd095157744c4bd0a67181fc4906e5b6"
					data-userId="8626857013"
					data-limitImg="8">
			</div>
		</div>
	</div> --}}
</div>
@endsection

@section('scripts')
	<script src="/external/jquery/jquery.min.js"></script>
	<script src="/external/bootstrap/js/bootstrap.min.js"></script>
	<script src="/js/app.js"></script>

	<script src="/external/slick/slick.min.js"></script>
	<script src="/external/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="/external/panelmenu/panelmenu.js"></script>
	<script src="/external/instafeed/instafeed.min.js"></script>
	<script src="/external/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="/external/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="/external/countdown/jquery.plugin.min.js"></script>
	<script src="/external/countdown/jquery.countdown.min.js"></script>
	<script src="/external/lazyLoad/lazyload.min.js"></script>
	<script src="/js/main.js"></script>
	<!-- form validation and sending to mail -->
	<script src="/external/form/jquery.form.js"></script>
	<script src="/external/form/jquery.validate.min.js"></script>
	<script src="/external/form/jquery.form-init.js"></script>
@endsection
