
<!DOCTYPE html>

<html>

<head>

	<title>Auto Spa - Car Wash Auto</title>

	<meta name="keywords" content="" />
	<meta name="description" content="" />		

	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700italic,700,900&amp;subset=latin,latin-ext">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=PT+Serif:700italic,700,400italic&amp;subset=latin,cyrillic-ext,latin-ext,cyrillic">

	<link rel="stylesheet" type="text/css" href="style/jquery.qtip.css"/>
	<link rel="stylesheet" type="text/css" href="style/jquery-ui.min.css"/>
	<link rel="stylesheet" type="text/css" href="style/superfish.css"/>
	<link rel="stylesheet" type="text/css" href="style/flexnav.css"/>
	<link rel="stylesheet" type="text/css" href="style/DateTimePicker.min.css"/>
	<link rel="stylesheet" type="text/css" href="style/fancybox/jquery.fancybox.css"/> 
	<link rel="stylesheet" type="text/css" href="style/fancybox/helpers/jquery.fancybox-buttons.css"/>
	<link rel="stylesheet" type="text/css" href="style/revolution/layers.css"/> 
	<link rel="stylesheet" type="text/css" href="style/revolution/settings.css"/> 
	<link rel="stylesheet" type="text/css" href="style/revolution/navigation.css"/> 
	<link rel="stylesheet" type="text/css" href="style/base.css"/> 
	<link rel="stylesheet" type="text/css" href="style/responsive.css"/> 

	<script type="text/javascript" src="script/jquery.min.js"></script>

</head>

<body class="template-page-home">

	<!-- Header -->
	<div class="template-header">

		<!-- Top header -->
		<div class="template-header-top">

			<!-- Logo -->
			<div class="template-header-top-logo">
				<a href="/" title="">
					<img src="media/image/logo.png" alt="" class="template-logo"/>
					<img src="media/image/logo_sticky.png" alt="" class="template-logo template-logo-sticky"/>
				</a>
			</div>

			<!-- Menu-->
			<div class="template-header-top-menu template-main">
				<nav>

					<!-- Default menu-->
					<div class="template-component-menu-default">
						<ul class="sf-menu">
							<li><a href="#head" class="template-state-selected">Home</a></li>

							<li><a href="#about">About</a></li>
							<li><a href="#services">Services</a></li>
							<li><a href="#contactus">Contact Us</a></li>
						</ul>
                    </div>
                </nav>
  <nav>
<!-- Mobile menu-->
	<div class="template-component-menu-responsive">
		<ul class="flexnav">
			<li><a href="#head" class="template-state-selected">Home</a></li>
			<li><a href="#about">About</a></li>
			<li><a href="#services">Services</a></li>
			<li><a href="#contactus">Contact Us</a></li>
        </ul>							
	</div>

</nav>
<script type="text/javascript">
	jQuery(document).ready(function($)
	{
		$('.template-header-top').templateHeader();
	});
</script>
</div>

<!-- Social icons -->
<div class="template-header-top-icon-list template-component-social-icon-list-1">
	<ul class="template-component-social-icon-list">
		<li><a href="#" class="template-icon-social-twitter" target="_blank"></a></li>
		<li><a href="#" class="template-icon-social-facebook" target="_blank"></a></li>
		<li><a href="#" class="template-icon-social-dribbble" target="_blank"></a></li>
		<li><a href="#" class="template-icon-meta-cart"></a></li>
		<li><a href="#" class="template-icon-meta-search"></a></li>
		<li><a href="#" class="template-icon-meta-menu"></a></li>
	</ul>
</div>

</div>				

@yield('content')

<!-- Search box -->
<div class="template-component-search-form">
	<div></div>
	<form>
		<div>
			<input type="search" name="search"/>
			<span class="template-icon-meta-search"></span>
			<input type="submit" name="submit" value=""/>
		</div>
	</form>
</div>

<!-- Go to top button -->
<a href="#go-to-top" class="template-component-go-to-top template-icon-meta-arrow-large-tb"></a>

<!-- Wrapper for date picker -->
<div id="dtBox"></div>

<!-- JS files -->
<script type="text/javascript" src="script/jquery-ui.min.js"></script>
<script type="text/javascript" src="script/superfish.min.js"></script>
<script type="text/javascript" src="script/jquery.easing.js"></script>
<script type="text/javascript" src="script/jquery.blockUI.js"></script>
<script type="text/javascript" src="script/jquery.qtip.min.js"></script>
<script type="text/javascript" src="script/jquery.fancybox.js"></script>
<script type="text/javascript" src="script/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="script/jquery.actual.min.js"></script>
<script type="text/javascript" src="script/jquery.flexnav.min.js"></script>
<script type="text/javascript" src="script/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="script/sticky.min.js"></script>
<script type="text/javascript" src="script/jquery.scrollTo.min.js"></script>
<script type="text/javascript" src="script/jquery.fancybox-media.js"></script>
<script type="text/javascript" src="script/jquery.fancybox-buttons.js"></script>
<script type="text/javascript" src="script/jquery.carouFredSel.packed.js"></script>
<script type="text/javascript" src="script/jquery.responsiveElement.js"></script>
<script type="text/javascript" src="script/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" src="script/DateTimePicker.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>  

<!-- Revolution Slider files -->
<script type="text/javascript" src="script/revolution/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="script/revolution/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="script/revolution/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="script/revolution/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="script/revolution/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="script/revolution/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="script/revolution/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="script/revolution/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="script/revolution/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="script/revolution/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="script/revolution/extensions/revolution.extension.video.min.js"></script>

<!-- Plugins files -->
<script type="text/javascript" src="plugin/booking/jquery.booking.js"></script>

<!-- Components files -->
<script type="text/javascript" src="script/template/jquery.template.tab.js"></script>
<script type="text/javascript" src="script/template/jquery.template.image.js"></script>
<script type="text/javascript" src="script/template/jquery.template.helper.js"></script>
<script type="text/javascript" src="script/template/jquery.template.header.js"></script>
<script type="text/javascript" src="script/template/jquery.template.counter.js"></script>
<script type="text/javascript" src="script/template/jquery.template.gallery.js"></script>
<script type="text/javascript" src="script/template/jquery.template.goToTop.js"></script>
<script type="text/javascript" src="script/template/jquery.template.fancybox.js"></script>
<script type="text/javascript" src="script/template/jquery.template.moreLess.js"></script>
<script type="text/javascript" src="script/template/jquery.template.googleMap.js"></script>
<script type="text/javascript" src="script/template/jquery.template.accordion.js"></script>
<script type="text/javascript" src="script/template/jquery.template.searchForm.js"></script>
<script type="text/javascript" src="script/template/jquery.template.testimonial.js"></script>
<script type="text/javascript" src="script/public.js"></script>

<!-- Optional JavaScript -->

</body>

</html>