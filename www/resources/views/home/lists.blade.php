@extends('layouts.home')

@section('content')
<div class="col-md-9">
	<div class="blog-posts">

		@foreach($articles as $k=>$v)
		<article class="post post-medium">
			<div class="row">

				<div class="col-md-5">
					<img style="width: 600px;" src="{{$v->img}}" class="img-reponsive">
				</div>
				<div class="col-md-7">

					<div class="post-content">

						<h2><a href="#">{{$v->title}}</a></h2>

					</div>
				</div>

			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="post-meta">
						<span><i class="fa fa-calendar"></i>{{$v->created_at}}</span>
						<span><i class="fa fa-user"></i> 作者 <a href="#">{{$v->user->username}}</a> </span>

						@foreach($tags as $key=>$val)
							@if(deep_in_array($val->id, $ids[$v->id]))
						<span><i class="fa fa-tag"></i> <a href="#">{{$val->name}}</a></span>
							@endif

						@endforeach

						<a href="{{route('detail',['id'=>$v->id])}}" class="btn btn-xs btn-primary pull-right">阅读</a>
					</div>
				</div>
			</div>

		</article>
		@endforeach
		<div id="pages" class="pull-right">
		{!!$articles->render()!!}
		</div>

	</div>
</div>
@endsection
