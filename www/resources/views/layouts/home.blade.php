
<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">

		<title>@yield('title')</title>		
		<meta name="keywords" content="html javascript mysql" />
		<meta name="description" content="this is a special website!!">
		<meta name="author" content="xiaohigh">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="/home/vendor/bootstrap/bootstrap.css">
		<link rel="stylesheet" href="/home/vendor/fontawesome/css/font-awesome.css">
		<link rel="stylesheet" href="/home/vendor/owlcarousel/owl.carousel.css" media="screen">
		<link rel="stylesheet" href="/home/vendor/owlcarousel/owl.theme.css" media="screen">
		<link rel="stylesheet" href="/home/vendor/magnific-popup/magnific-popup.css" media="screen">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="/home/css/theme.css">
		<link rel="stylesheet" href="/home/css/theme-elements.css">
		<link rel="stylesheet" href="/home/css/theme-blog.css">
		<link rel="stylesheet" href="/home/css/theme-shop.css">
		<link rel="stylesheet" href="/home/css/theme-animate.css">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="/home/css/skins/default.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="/home/css/custom.css">

		<!-- Head Libs -->
		<script src="/home/vendor/modernizr/modernizr.js"></script>

		<!--[if IE]>
			<link rel="stylesheet" href="css/ie.css">
		<![endif]-->

		<!--[if lte IE 8]>
			<script src="/home/vendor/respond/respond.js"></script>
			<script src="/home/vendor/excanvas/excanvas.js"></script>
		<![endif]-->

	</head>
	<body>

		<div class="body">
			<header id="header">
				<div class="container">
					<h1 class="logo">
						<a href="/articles">
							<img alt="Porto" width="111" height="54" data-sticky-width="82" data-sticky-height="40" src="/home/img/logo.png">
						</a>
					</h1>
					<div class="search">
						<form id="searchForm" action="page-search-results.html" method="get">
							<div class="input-group">
								<input type="text" class="form-control search" name="q" id="q" placeholder="Search..." required>
								<span class="input-group-btn">
									<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
								</span>
							</div>
						</form>
					</div>
					
					<button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
						<i class="fa fa-bars"></i>
					</button>
				</div>
				<?php $cates = \App\Cate::get();  ?>
				<div class="navbar-collapse nav-main-collapse collapse">
					<div class="container">
						
						<nav class="nav-main mega-menu">
							<ul class="nav nav-pills nav-main" id="mainMenu">
								@foreach($cates as $k=>$v)
								<li class="dropdown">
									<a class="dropdown-toggle" href="#">
										{{$v->name}}
										<i class="fa fa-angle-down"></i>
									</a>
								</li>
								@endforeach
							</ul>
						</nav>
					</div>
				</div>
			</header>

			<div role="main" class="main">
			@section('header')
				<section class="page-top">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<ul class="breadcrumb">
									<li><a href="#">Home</a></li>
									<li class="active">Blog</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h2>文章列表</h2>
							</div>
						</div>
					</div>
				</section>
			@show

				<div class="container">

					<div class="row">
						@section('content')
						<div class="col-md-9">
							<div class="blog-posts">

								
								<article class="post post-medium">
									<div class="row">

										<div class="col-md-5">
											<div class="post-image">
												<div class="owl-carousel" data-plugin-options='{"items":1}'>
													<div>
														<div class="img-thumbnail">
															<img class="img-responsive" src="img/blog/blog-image-1.jpg" alt="">
														</div>
													</div>
													<div>
														<div class="img-thumbnail">
															<img class="img-responsive" src="img/blog/blog-image-2.jpg" alt="">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-7">

											<div class="post-content">

												<h2><a href="#">Class aptent taciti sociosqu ad litora torquent</a></h2>
												<p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. Pellentesque pellentesque tempor tellus eget hendrerit. Morbi id aliquam ligula. Aliquam id dui sem. Proin rhoncus consequat nisl, eu ornare mauris tincidunt vitae. [...]</p>

											</div>
										</div>

									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="post-meta">
												<span><i class="fa fa-calendar"></i> January 10, 2017 </span>
												<span><i class="fa fa-user"></i> By <a href="#">John Doe</a> </span>
												<span><i class="fa fa-tag"></i> <a href="#">Duis</a>, <a href="#">News</a> </span>
												<span><i class="fa fa-comments"></i> <a href="#">12 Comments</a></span>
												<a href="#" class="btn btn-xs btn-primary pull-right">Read more...</a>
											</div>
										</div>
									</div>

								</article>

								

								<ul class="pagination pagination-lg pull-right">
									<li><a href="#">«</a></li>
									<li class="active"><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">»</a></li>
								</ul>

							</div>
						</div>
						@show
						<div class="col-md-3">
							<aside class="sidebar">

								<hr />
								<h4>分类信息</h4>
								<ul class="nav nav-list primary push-bottom">
									@foreach($cates as $k=>$v)
									<li><a href="#">{{$v->name}}</a></li>
									@endforeach
									
								</ul>

								<div class="tabs">
									<ul class="nav nav-tabs">
										<li  class="active"><a href="#recentPosts" data-toggle="tab">最新</a></li>
									</ul>
									<div class="tab-content">
										<?php $recent = \App\Post::orderBy('id','desc')->take(3)->get(); ?>
										<div class="tab-pane active" id="recentPosts">
											<ul class="simple-post-list">
												@foreach($recent as $k=>$v)
												<li>
													<div class="post-image">
														<div class="img-thumbnail">
															<a href="#">
																<img src="{{$v->img}}" class="img-responsive" width="40" alt="">
															</a>
														</div>
													</div>
													<div class="post-info">
														<a href="{{route('detail',['id'=>$v->id])}}">{{$v->title}}</a>
														<div class="post-meta">
															 {{$v->created_at}}
														</div>
													</div>
												</li>
												@endforeach
											</ul>
										</div>
									</div>
								</div>

								<hr />

								

							</aside>
						</div>
					</div>
				</div>
			
			</div>

			<footer id="footer" style="border:none;padding:0px">
				<div class="footer-copyright">
					<div class="container">
						<div class="row">
							<div class="col-md-1">
								<a href="index.html" class="logo">
									<img alt="Porto Website Template" class="img-responsive" src="img/logo-footer.png">
								</a>
							</div>
							<div class="col-md-7">
								<p>© Copyright 2014. All Rights Reserved.</p>
							</div>
							<div class="col-md-4">
								<nav id="sub-menu">
									<ul>
										<li><a href="page-faq.html">FAQ's</a></li>
										<li><a href="sitemap.html">Sitemap</a></li>
										<li><a href="contact-us.html">Contact</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<!-- Vendor -->
		<script src="/home/vendor/jquery/jquery.js"></script>
		<script src="/home/vendor/jquery.appear/jquery.appear.js"></script>
		<script src="/home/vendor/jquery.easing/jquery.easing.js"></script>
		<script src="/home/vendor/jquery-cookie/jquery-cookie.js"></script>
		<script src="/home/vendor/bootstrap/bootstrap.js"></script>
		<script src="/home/vendor/common/common.js"></script>
		<script src="/home/vendor/jquery.validation/jquery.validation.js"></script>
		<script src="/home/vendor/jquery.stellar/jquery.stellar.js"></script>
		<script src="/home/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
		<script src="/home/vendor/jquery.gmap/jquery.gmap.js"></script>
		<script src="/home/vendor/twitterjs/twitter.js"></script>
		<script src="/home/vendor/isotope/jquery.isotope.js"></script>
		<script src="/home/vendor/owlcarousel/owl.carousel.js"></script>
		<script src="/home/vendor/jflickrfeed/jflickrfeed.js"></script>
		<script src="/home/vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="/home/vendor/vide/vide.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="/home/js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="/home/js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="/home/js/theme.init.js"></script>

		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script type="text/javascript">
		
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-12345678-1']);
			_gaq.push(['_trackPageview']);
		
			(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		
		</script>
		 -->

	</body>
</html>
