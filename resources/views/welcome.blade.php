<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>GrandPayer</title>
		<meta name="keywords" content="HTML5,CSS3,Template" />
		<meta name="description" content="" />
		<meta name="Author" content="Dorin Grigoras [www.stepofweb.com]" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

		<!-- WEB FONTS : use %7C instead of | (pipe) -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		<link href="assets2/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

		<!-- THEME CSS -->
		<link href="assets2/css/essentials.css" rel="stylesheet" type="text/css" />
		<link href="assets2/css/layout.css" rel="stylesheet" type="text/css" />

		<!-- PAGE LEVEL SCRIPTS -->
		<link href="assets2/css/header-1.css" rel="stylesheet" type="text/css" />
		<link href="assets2/css/layout-shop.css" rel="stylesheet" type="text/css" />
		
		<style>
			img.img-responsive.radius-4{
				height:335px!important
			}
			img.footer-logo{
				height:100px;
			}
			footer>.container{
				padding:0px!important;
				margin-bottom: 0px!important;
			}
			section{
				padding:20px
			}
			.caption-slider-default{
				background-color: rgba(0, 0, 0, 0.28)
			}
			.img-hover>a>.img-responsive{
				width: 265px;
				height:176.266px;
			}
            #footer{
                background: linear-gradient(to bottom, #555555 0%,#21191b 100%);
            }
		</style>
		<link rel="stylesheet" href="assets2/layerslider.css">
	</head>
	<body class="smoothscroll enable-animation">
		<!-- wrapper -->
		<div id="wrapper">

			<!-- Top Bar -->
			<div id="topBar">

				<div class="container">

					<!-- right -->
					<ul class="top-links list-inline pull-right">
						<!--<li class="text-welcome hidden-xs">Welcome to GrandPayer, <strong>John Doe</strong></li>-->
						<!--<li>-->
						<!--	<a class="dropdown-toggle no-text-underline" data-toggle="dropdown" href="#">MY ACCOUNT</a>-->
						<!--	<ul class="dropdown-menu pull-right">-->
						<!--		<li><a tabindex="-1" href="#"><i class="fa fa-history"></i> ORDER HISTORY</a></li>-->
						<!--		<li class="divider"></li>-->
						<!--		<li><a tabindex="-1" href="#"><i class="fa fa-bookmark"></i> WISHLIST</a></li>-->
						<!--		<li><a tabindex="-1" href="#"><i class="fa fa-cog"></i> SETTINGS</a></li>-->
						<!--		<li class="divider"></li>-->
						<!--		<li><a tabindex="-1" href="#"><i class="glyphicon glyphicon-off"></i> LOGOUT</a></li>-->
						<!--	</ul>-->

						<!--</li>-->
						<li class="hidden-xs"><a href="{{route('login')}}">LOGIN</a></li>
						<li class="hidden-xs"><a href="/account/signup">REGISTER</a></li>
					</ul>

					<!-- left -->
					<!--<ul class="top-links list-inline">-->
					<!--	<li class="hidden-xs"><a href="page-faq-1.html">FAQ</a></li>-->
					<!--	<li>-->
					<!--		<a class="dropdown-toggle no-text-underline" data-toggle="dropdown" href="#"><img class="flag-lang" src="{{ url('assets2/images/flags/us.png') }}" width="16" height="11" alt="lang"> ENGLISH</a>-->
					<!--		<ul class="dropdown-langs dropdown-menu pull-right">-->
					<!--			<li><a tabindex="-1" href="#"><img class="flag-lang" src="{{ url('assets2/images/flags/us.png') }}" width="16" height="11" alt="lang"> ENGLISH</a></li>-->
					<!--			<li class="divider"></li>-->
					<!--			<li><a tabindex="-1" href="#"><img class="flag-lang" src="{{ url('assets2/images/flags/de.png') }}" width="16" height="11" alt="lang"> GERMAN</a></li>-->
					<!--			<li><a tabindex="-1" href="#"><img class="flag-lang" src="{{ url('assets2/images/flags/ru.png') }}" width="16" height="11" alt="lang"> RUSSIAN</a></li>-->
					<!--			<li><a tabindex="-1" href="#"><img class="flag-lang" src="{{ url('assets2/images/flags/it.png') }}" width="16" height="11" alt="lang"> ITALIAN</a></li>-->
					<!--		</ul>-->

					<!--	</li>-->
					<!--</ul>-->
				</div>

			</div>
			<!-- /Top Bar -->

			<!--
				AVAILABLE HEADER CLASSES

				Default nav height: 96px
				.header-md 		= 70px nav height
				.header-sm 		= 60px nav height

				.noborder 		= remove bottom border (only with transparent use)
				.transparent	= transparent header
				.translucent	= translucent header
				.sticky			= sticky header
				.static			= static header
				.dark			= dark header
				.bottom			= header on bottom

				shadow-before-1 = shadow 1 header top
				shadow-after-1 	= shadow 1 header bottom
				shadow-before-2 = shadow 2 header top
				shadow-after-2 	= shadow 2 header bottom
				shadow-before-3 = shadow 3 header top
				shadow-after-3 	= shadow 3 header bottom

				.clearfix		= required for mobile menu, do not remove!

				Example Usage:  class="clearfix sticky header-sm transparent noborder"
			-->
			<div id="header" class="sticky clearfix">

				<!-- SEARCH HEADER -->
				<!--<div class="search-box over-header">-->
				<!--	<a id="closeSearch" href="#" class="glyphicon glyphicon-remove"></a>-->

				<!--	<form action="page-search-result-1.html" method="get">-->
				<!--		<input style="text-align: center" type="text" class="form-control" placeholder="WHAT DO YOU NEED?" />-->
				<!--	</form>-->
				<!--</div>-->
				<!-- /SEARCH HEADER -->


				<!-- TOP NAV -->
				<header id="topNav">
					<div class="container">
						<!-- Mobile Menu Button -->
						<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
							<i class="fa fa-bars"></i>
						</button>
						<!-- /BUTTONS -->

						<!-- Logo -->
						<a class="logo pull-left" href="/">
							<img src="assets/grandpayer-admin.png" alt="GrandPayer Logo" />
							
						</a>

						<!--
							Top Nav

							AVAILABLE CLASSES:
							submenu-dark = dark sub menu
						-->
						<div class="navbar-collapse pull-left nav-main-collapse collapse submenu-dark">
							<nav class="nav-main">

								<!--
									NOTE

									For a regular link, remove "dropdown" class from LI tag and "dropdown-toggle" class from the href.
									Direct Link Example:

									<li>
										<a href="#">HOME</a>
									</li>
								-->
                                <ul id="topMain" class="nav nav-pills nav-main">
                                    <li class=""><!-- HOME -->
                                        <a class="" href="/">
                                            HOME
                                        </a>
                                    </li>
         <!--                           <li class=""><!-- HOME -->
         <!--                               <a class="" href="products.html">-->
         <!--                                   CONTACT-->
         <!--                               </a>-->
         <!--                           </li>-->
									<!--<li class=""><!-- HOME -->
									<!--	<a class="" href="products.html">-->
									<!--		FAQ-->
									<!--	</a>-->
									<!--</li>-->
                                </ul>

							</nav>
						</div>

					</div>
				</header>
				<!-- /Top Nav -->

			</div>


			<!--
				PAGE HEADER

				CLASSES:
					.page-header-xs	= 20px margins
					.page-header-md	= 50px margins
					.page-header-lg	= 80px margins
					.page-header-xlg= 130px margins
					.dark			= dark page header

					.shadow-before-1 	= shadow 1 header top
					.shadow-after-1 	= shadow 1 header bottom
					.shadow-before-2 	= shadow 2 header top
					.shadow-after-2 	= shadow 2 header bottom
					.shadow-before-3 	= shadow 3 header top
					.shadow-after-3 	= shadow 3 header bottom
			-->



			<section class="border-bottom-2">
				<div class="container">

					<!--
						AVAILABLE CLASSES
							.height-300
							.height-350
							.height-400
							.height-450
							.height-500
							.height-550
							.height-600
							.height-650
							.height-700
							.height-750
							.height-800
					-->
					<div class="layerslider height-500" style="margin-bottom:100px">

						<!-- SLIDE -->
						<div class="ls-slide" data-ls="slidedelay:4500;transition2d:24,25,27,28,34,35,37,38,110,113;">
							<img src="/assets2/images/1x1.png" data-src="/assets2/blur.jpg" class="ls-bg" alt="Slide background" />

							<h5 class="ls-l" style="top:257px;left:50%;text-align: center; background: black; background: rgba(0,0,0,.75); font-weight: normal;width:350px;height:100px;font-size:50px;line-height:100px;color:#eee;border-radius:5px;white-space: nowrap;" data-ls="offsetxin:0;scalexin:0;scaleyin:0;offsetxout:0;offsetyout:top;durationout:750;showuntil:500;fadeout:false;">Welcome to</h5>
							<h5 class="ls-l" style="top:363px;left:50%;text-align: center; font-weight: normal; padding-left:10px; padding-right:10px; height:100px;font-size:50px;line-height:100px;color:#444;background:white;border-radius:5px;white-space: nowrap;" data-ls="offsetxin:0;scalexin:0;scaleyin:0;offsetxout:0;offsetyout:bottom;durationout:750;showuntil:500;fadeout:false;">GrandPayer</h5>

							<h5 class="ls-l" style="top:249px;left:384px;text-align: center; font-weight: normal;width:100px;height:70px;font-size:40px;line-height:70px;color:white;background:#cf431d;border-radius:5px;white-space: nowrap;" data-ls="offsetxin:0;durationin:2000;delayin:2000;rotatein:-90;scalexin:2.5;scaleyin:2.5;offsetxout:0;durationout:1000;rotateout:-90;scalexout:0;scaleyout:0;">The</h5>
							<h5 class="ls-l" style="top:249px;left:490px;text-align: center; font-weight: normal;width:285px;height:70px;font-size:40px;line-height:70px;color:white;background:#cf431d;border-radius:5px;white-space: nowrap;" data-ls="offsetxin:0;offsetyin:top;durationin:1500;delayin:1600;easingin:easeInOutQuart;fadein:false;scalexin:5;scaleyin:5;offsetxout:0;offsetyout:top;durationout:1000;fadeout:false;">Solution To All</h5>
							<h5 class="ls-l" style="top:249px;left:781px;text-align: center; font-weight: normal;width:115px;height:70px;font-size:40px;line-height:70px;color:white;background:#cf431d;border-radius:5px;white-space: nowrap;" data-ls="offsetxin:0;durationin:2000;delayin:2200;rotatein:90;scalexin:2.5;scaleyin:2.5;offsetxout:0;durationout:1000;rotateout:90;scalexout:0;scaleyout:0;">Your</h5>
							<h5 class="ls-l" style="top:325px;left:384px;text-align: center; background: black; background: rgba(0,0,0,.75); font-weight: normal;width:270px;height:70px;font-size:40px;line-height:70px;color:white;border-radius:5px;white-space: nowrap;" data-ls="offsetxin:left;durationin:1500;delayin:1800;easingin:easeInOutQuart;fadein:false;scalexin:5;scaleyin:5;offsetxout:left;durationout:1000;fadeout:false;">Capital</h5>
							<h5 class="ls-l" style="top:325px;left:660px;text-align: center; background: black; background: rgba(0,0,0,.75); font-weight: normal;width:236px;height:70px;font-size:40px;line-height:70px;color:white;border-radius:5px;white-space: nowrap;" data-ls="offsetxin:right;durationin:1500;delayin:1500;easingin:easeInOutQuart;fadein:false;scalexin:5;scaleyin:5;offsetxout:right;durationout:1000;fadeout:false;">Issues</h5>
							<h5 class="ls-l" style="top:401px;left:384px;text-align: center; font-weight: normal;width:110px;height:70px;font-size:40px;line-height:70px;color:#444;background:white;border-radius:5px;white-space: nowrap;" data-ls="offsetxin:0;durationin:2000;delayin:2100;rotatein:90;scalexin:2.5;scaleyin:2.5;offsetxout:0;durationout:1000;rotateout:90;scalexout:0;scaleyout:0;">In</h5>
							<h5 class="ls-l" style="top:401px;left:500px;text-align: center; font-weight: normal;width:205px;height:70px;font-size:40px;line-height:70px;color:#444;background:white;border-radius:5px;white-space: nowrap;" data-ls="offsetxin:0;offsetyin:bottom;durationin:1500;delayin:1700;easingin:easeInOutQuart;fadein:false;scalexin:5;scaleyin:5;offsetxout:0;offsetyout:bottom;durationout:1000;fadeout:false;">Sintilizing</h5>
							<h5 class="ls-l" style="top:401px;left:711px;text-align: center; font-weight: normal;width:185px;height:70px;font-size:40px;line-height:70px;color:#444;background:white;border-radius:5px;white-space: nowrap;" data-ls="offsetxin:0;durationin:2000;delayin:2300;rotatein:-90;scalexin:2.5;scaleyin:2.5;offsetxout:0;durationout:1000;rotateout:-90;scalexout:0;scaleyout:0;">Packages</h5>
						</div>

						

					</div>

					<script type="text/javascript">
                        var layer_options = {
                            pauseOnHover:false,
                            animateFirstSlide:true,
                            twoWaySlideshow:true,
                            navStartStop:false,
                            navButtons:false,
                            showCircleTimer:false,
                            thumbnailNavigation:'always',
                            autoPlayVideos:false,
                            lazyLoad:false,
                            cbInit:function(element){},
                            cbStart:function(data){},
                            cbStop:function(data){},
                            cbPause:function(data){},
                            cbAnimStart:function(data){},
                            cbAnimStop:function(data){},
                            cbPrev:function(data){},
                            cbNext:function(data){},

                            responsive: 		false,
                            responsiveUnder: 	1280,
                            layersContainer: 	1280,

                            skin:				'borderlessdark',
                            skinsPath: 			"assets2/plugins/slider.layerslider/skins/"
                        }
					</script>

				</div>
			</section>

			<section class="border-bottom-2">
				<div class="container margin-bottom-60">
					<div class="row countTo-lg text-center">
						<div class="row"><h3 class="text-center border-black border-bottom-3 col-md-4 col-md-offset-4">Members In Our Packages</h3></div>

						<div class="col-xs-6 col-md-5th">
							<span class="countTo" data-speed="3000" style="color:#59BA41">1303</span>
							<h4>CLASSIC</h4>
						</div>

						<div class="col-xs-6 col-md-5th">
							<span class="countTo" data-speed="3000" style="color:#774F38">56000</span>
							<h4>PROFESSIONAL</h4>
						</div>

						<div class="col-xs-6 col-md-5th">
							<span class="countTo" data-speed="3000" style="color:#C02942">4897</span>
							<h4>PREMIUM</h4>
						</div>

						<div class="col-xs-6 col-md-5th">
							<span class="countTo" data-speed="3000" style="color:#1693A5">9877</span>
							<h4>ULTIMATE</h4>
						</div>

						<div class="col-xs-6 col-md-5th">
							<span class="countTo" data-speed="3000" style="color:#9e9d15">9877</span>
							<h4>BOSS</h4>
						</div>

					</div>
				</div>
			</section>
			<section class="border-bottom-3">
				<div class="container margin-bottom-60">
					<div class="row pricetable-container">
						<div class="row"><h3 class="text-center border-black border-bottom-3 col-md-4 col-md-offset-4">Packages For You</h3></div>


						<div class="col-md-5th price-table popular">
							<h3>CLASSIC</h3>
							<p>
								N5,000
								<span>Per month</span>
							</p>

							<ul>
								<li><i class="fa fa-check"></i>3:1 Matrix</li>
								<li><i class="fa fa-check"></i>Auto Assign</li>
								<li><i class="fa fa-check"></i>Pay Out/In Option</li>
								<li><i class="fa fa-check"></i>Referral Wallet </li>
								<li><i class="fa fa-check"></i>Cash Out </li>
								<li><i class="fa fa-check"></i>WildCard Auto Recycle </li>
								<li><i class="fa fa-check"></i>N15,000 Return Investment</li>
							</ul>
							<a href="/account/signup" class="btn btn-primary">SIGN UP</a>
						</div>

						<div class="col-md-5th price-table">
							<h3>PROFESSIONAL</h3>
							<p>
								N10,000
								<span>Per month</span>
							</p>
							<ul>
								<li><i class="fa fa-check"></i>3:1 Matrix</li>
								<li><i class="fa fa-check"></i>Auto Assign</li>
								<li><i class="fa fa-check"></i>Pay Out/In Option</li>
								<li><i class="fa fa-check"></i>Referral Wallet </li>
								<li><i class="fa fa-check"></i>Cash Out </li>
								<li><i class="fa fa-check"></i>WildCard Auto Recycle </li>
								<li><i class="fa fa-check"></i>N30,000 Return Investment</li>
							</ul>
							<a href="/account/signup" class="btn btn-default">SIGN UP</a>
						</div>

						<div class="col-md-5th price-table popular">
							<h3>PREMIUM</h3>
							<p>
								N20,000
								<span>Per month</span>
							</p>
							<ul>
								<li><i class="fa fa-check"></i>3:1 Matrix</li>
								<li><i class="fa fa-check"></i>Auto Assign</li>
								<li><i class="fa fa-check"></i>Pay Out/In Option</li>
								<li><i class="fa fa-check"></i>Referral Wallet </li>
								<li><i class="fa fa-check"></i>Cash Out </li>
								<li><i class="fa fa-check"></i>WildCard Auto Recycle </li>
								<li><i class="fa fa-check"></i>N60,000 Return Investment</li>
							</ul>
							<a href="/account/signup" class="btn btn-primary">SIGN UP</a>
						</div>

						<div class="col-md-5th price-table">
							<h3>ULTIMATE</h3>
							<p>
								N50,000
								<span>Per month</span>
							</p>
							<ul>
								<li><i class="fa fa-check"></i>3:1 Matrix</li>
								<li><i class="fa fa-check"></i>Auto Assign</li>
								<li><i class="fa fa-check"></i>Pay Out/In Option</li>
								<li><i class="fa fa-check"></i>Referral Wallet </li>
								<li><i class="fa fa-check"></i>Cash Out </li>
								<li><i class="fa fa-check"></i>WildCard Auto Recycle </li>
								<li><i class="fa fa-check"></i>N150,000 Return Investment</li>
							</ul>
							<a href="/account/signup" class="btn btn-primary">SIGN UP</a>
						</div>

						<div class="col-md-5th price-table popular">
							<h3>BOSS</h3>
							<p>
								N100,000
								<span>Per month</span>
							</p>
							<ul>
								<li><i class="fa fa-check"></i>3:1 Matrix</li>
								<li><i class="fa fa-check"></i>Auto Assign</li>
								<li><i class="fa fa-check"></i>Pay Out/In Option</li>
								<li><i class="fa fa-check"></i>Referral Wallet </li>
								<li><i class="fa fa-check"></i>Cash Out </li>
								<li><i class="fa fa-check"></i>WildCard Auto Recycle </li>
								<li><i class="fa fa-check"></i>N300,000 Return Investment</li>
							</ul>
							<a href="/account/signup" class="btn btn-primary">SIGN UP</a>
						</div>

					</div>
				</div>
			</section>

			<section class="border-bottom-2">
				<div class="container margin-bottom-30">
					<div class="row"><h3 class="text-center border-black border-bottom-3 col-md-4 col-md-offset-4">Testimonials</h3></div>
					<ul class="row clearfix testimonial-dotted list-unstyled">
						<li class="col-md-4">
							<div class="testimonial">
								<figure class="pull-left">
									<img class="rounded" src="/assets2/guy.png" alt="" />
								</figure>
								<div class="testimonial-content">
									<p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam quibusdam cum libero illo rerum!</p>
									<cite>
										Joana Doe
										<span>Company Ltd.</span>
									</cite>
								</div>
							</div>
						</li>
						<li class="col-md-4">
							<div class="testimonial">
								<figure class="pull-left">
									<img class="rounded" src="assets2/girl.png" alt="" />
								</figure>
								<div class="testimonial-content">
									<p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam quibusdam cum libero illo rerum!</p>
									<cite>
										Melissa Doe
										<span>Company Ltd.</span>
									</cite>
								</div>
							</div>
						</li>
						<li class="col-md-4">
							<div class="testimonial">
								<figure class="pull-left">
									<img class="rounded" src="assets2/girl.png" alt="" />
								</figure>
								<div class="testimonial-content">
									<p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam quibusdam cum libero illo rerum!</p>
									<cite>
										Stephany Doe
										<span>Company Ltd.</span>
									</cite>
								</div>
							</div>
						</li>
						<li class="col-md-4">
							<div class="testimonial">
								<figure class="pull-left">
									<img class="rounded" src="/assets2/guy.png" alt="" />
								</figure>
								<div class="testimonial-content">
									<p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam quibusdam cum libero illo rerum!</p>
									<cite>
										Pamela Doe
										<span>Company Ltd.</span>
									</cite>
								</div>
							</div>
						</li>
						<li class="col-md-4">
							<div class="testimonial">
								<figure class="pull-left">
									<img class="rounded" src="/assets2/guy.png" alt="" />
								</figure>
								<div class="testimonial-content">
									<p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam quibusdam cum libero illo rerum!</p>
									<cite>
										Simina Doe
										<span>Company Ltd.</span>
									</cite>
								</div>
							</div>
						</li>
						<li class="col-md-4">
							<div class="testimonial">
								<figure class="pull-left">
									<img class="rounded" src="assets2/girl.png" alt="" />
								</figure>
								<div class="testimonial-content">
									<p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam quibusdam cum libero illo rerum!</p>
									<cite>
										Mihaela Doe
										<span>Company Ltd.</span>
									</cite>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div class="row"><h3 class="text-center col-md-4 col-md-offset-4"><a class="btn btn-bordered" href="#">View More</a> </h3></div>
			</section>

			<section class="margin-top-30 margin-bottom-30 alternate">
				<div class="container">

					<div class="text-center">
						<h2 class="wow fadeInUp nomargin animated" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">INTERESTED IN WHAT WE ARE DOING?</h2>

						<p class="lead font-lato size-30 wow fadeInUp margin-bottom-60 animated" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">why Not Study</p>

						<div class="margin-top-30">
							<!--<a href="#" class="btn btn-bordered btn-lg wow fadeInUp btn-teal animated" data-wow-delay="0.7" style="visibility: visible; animation-name: fadeInUp;"><i class="glyphicon glyphicon-th-large"></i>HOW IT WORKS</a>
							<span class="size-17 hidden-xs wow fadeInUp animated" data-wow-delay="1s" style="visibility: visible; animation-delay: 1s; animation-name: fadeInUp;">&nbsp; &amp; &nbsp;</span>-->
							<a href="/account/signup" class="btn btn-bordered btn-lg wow fadeInUp btn-red animated" data-wow-delay="0.59" style="visibility: visible; animation-name: fadeInUp;"><i class="glyphicon glyphicon-user"></i>SUBSCRIBE FOR A PACKAGE</a>
						</div>
					</div>

				</div>
			</section>

			<!-- FOOTER -->
			<footer id="footer">
				<div class="container">

					<div class="row margin-top-60 margin-bottom-40 size-13">

						<!-- col #1 -->
						<div class="col-md-4 col-sm-4">

							<!-- Footer Logo -->
							<!--<img class="footer-logo" src="{{ url('/assets/grandpayer-admin.png') }}" alt="" />-->

						</div>
						<!-- /col #1 -->

						<!-- col #2 -->
						<div class="col-md-8 col-sm-8">

							<div class="row">

								<div class="col-md-5 hidden-sm hidden-xs">
									<!--<h4 class="letter-spacing-1">RECENT NEWS</h4>-->
									<!--<ul class="list-unstyled footer-list half-paddings">-->
									<!--	<li>-->
									<!--		<a class="block" href="#">We Shall be going on a 2-day mantenance break in 3days</a>-->
									<!--		<small>Feb 29, 2017</small>-->
									<!--	</li>-->
									<!--</ul>-->
								</div>

								<div class="col-md-3 hidden-sm hidden-xs">
									<h4 class="letter-spacing-1">EXPLORE US</h4>
									<ul class="list-unstyled footer-list half-paddings noborder">
										<li><a class="block" href="#"><i class="fa fa-angle-right"></i> About Us</a></li>
									</ul>
								</div>

								<div class="col-md-4">
									<h4 class="letter-spacing-1">FOLLOW US</h4>

									<!-- Social Icons -->
									<div class="clearfix">

										<a href="#" class="social-icon social-icon-sm social-icon-border social-facebook pull-left" data-toggle="tooltip" data-placement="top" title="Facebook">
											<i class="icon-facebook"></i>
											<i class="icon-facebook"></i>
										</a>

										<a href="#" class="social-icon social-icon-sm social-icon-border social-twitter pull-left" data-toggle="tooltip" data-placement="top" title="Twitter">
											<i class="icon-twitter"></i>
											<i class="icon-twitter"></i>
										</a>

										<a href="#" class="social-icon social-icon-sm social-icon-border social-gplus pull-left" data-toggle="tooltip" data-placement="top" title="Google plus">
											<i class="icon-gplus"></i>
											<i class="icon-gplus"></i>
										</a>

										<a href="#" class="social-icon social-icon-sm social-icon-border social-linkedin pull-left" data-toggle="tooltip" data-placement="top" title="Linkedin">
											<i class="icon-linkedin"></i>
											<i class="icon-linkedin"></i>
										</a>

										<a href="#" class="social-icon social-icon-sm social-icon-border social-rss pull-left" data-toggle="tooltip" data-placement="top" title="Rss">
											<i class="icon-rss"></i>
											<i class="icon-rss"></i>
										</a>

									</div>
									<h4>+2348112345678</h4>
									<!-- /Social Icons -->

								</div>

							</div>

						</div>
						<!-- /col #2 -->

					</div>

				</div>

				<div class="copyright">
					<div class="container">
						<!--<ul class="pull-right nomargin list-inline mobile-block">-->
						<!--	<li><a href="#">Terms &amp; Conditions</a></li>-->
						<!--	<li>&bull;</li>-->
						<!--	<li><a href="#">Privacy</a></li>-->
						<!--</ul>-->

						&copy;2017 All Rights Reserved, GrandPayer
					</div>
				</div>

			</footer>
			<!-- /FOOTER -->

		</div>
		<!-- /wrapper -->


		<!-- SCROLL TO TOP -->
		<a href="#" id="toTop"></a>


		<!-- PRELOADER -->
		<div id="preloader">
			<div class="inner">
				<span class="loader"></span>
			</div>
		</div><!-- /PRELOADER -->


		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = "assets2/plugins/";</script>
		<script type="text/javascript" src="assets2/plugins/jquery/jquery-2.1.4.min.js"></script>

		<script type="text/javascript" src="assets2/js/scripts.js"></script>

		<!-- STYLESWITCHER - REMOVE -->
		<!--<script async type="text/javascript" src="{{ url('assets2/plugins/styleswitcher/styleswitcher.js') }}"></script>-->

		<!-- PAGE LEVEL SCRIPTS -->
		<script type="text/javascript" src="assets2/js/view/demo.shop.js"></script>
		<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

					</div>

					<!-- Modal Body -->
					<div class="modal-body">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

							<!-- ALERT -->
							<!--
                            <div class="alert alert-mini alert-danger margin-bottom-30">
                                <strong>Oh snap!</strong> Login Incorrect!
                            </div>
                            -->
							<!-- /ALERT -->

							<!-- login form -->
							<form action="index.html" method="post" class="sky-form boxed">
								<header><i class="fa fa-users"></i> Sign In</header>

								<fieldset class="nomargin">

									<label class="label margin-top-20">E-mail</label>
									<label class="input">
										<i class="ico-append fa fa-envelope"></i>
										<input type="email">
										<span class="tooltip tooltip-top-right">Email Address</span>
									</label>

									<label class="label margin-top-20">Password</label>
									<label class="input">
										<i class="ico-append fa fa-lock"></i>
										<input type="password">
										<b class="tooltip tooltip-top-right">Type your Password</b>
									</label>
									<label class="checkbox margin-top-20">
										<input type="checkbox" name="checkbox-inline">
										<i></i> Keep me logged in
									</label>

								</fieldset>

								<footer class="celarfix">
									<button type="submit" class="btn btn-primary noradius pull-right"><i class="fa fa-check"></i> OK, LOG IN</button>
								</footer>
							</form>
							<!-- /login form -->

							<div class="socials margin-top10 text-center"><!-- more buttons: ui-buttons.html -->
								<a href="#" class="social-icon social-facebook" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>
								<a href="#" class="social-icon social-twitter" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>
								<a href="#" class="social-icon social-google" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google">
									<i class="icon-google-plus"></i>
									<i class="icon-google-plus"></i>
								</a>

							</div>

						</div>
					</div>

					<!-- Modal Footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>

				</div>
			</div>
		</div>




		<script src="assets2/layerslider_pack.js"></script>
		<script src="assets2/demo.layerslider_slider.js"></script>
	</body>
</html>