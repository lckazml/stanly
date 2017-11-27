@extends('layouts.home')

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
					<h2>文章详情</h2>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('content')
<div class="col-md-9">
	<div class="blog-posts single-post">

		<article class="post post-large blog-single-post">
			<div class="post-image">
				<img style="width: 600px;" src="{{$article->img}}">
			</div>

			<div class="post-date">
				<span class="day">10</span>
				<span class="month">Jan</span>
			</div>

			<div class="post-content">

				<h2><a href="#">{{$article->title}}</a></h2>

				<div class="post-meta">
					<span><i class="fa fa-user"></i> 作者: <a href="#">{{$article->user->username}}</a> </span>
				</div>

				{!!$article->content!!}


				<div class="post-block post-share">
					<h3><i class="fa fa-share"></i>分享</h3>

					<!-- AddThis Button BEGIN -->
					<div class="addthis_toolbox addthis_default_style ">
						<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
						<a class="addthis_button_tweet"></a>
						<a class="addthis_button_pinterest_pinit"></a>
						<a class="addthis_counter addthis_pill_style"></a>
					</div>

				</div>

			

				
			</div>
		</article>

	</div>
</div>
@endsection


@section('title', $article->title)