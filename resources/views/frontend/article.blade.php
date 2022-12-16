@extends('frontend.master')
@section('title')
<title>{{$data->title}} | NEWSHUB</title>
@stop
@section('content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v11.0" nonce="whuzci3v"></script>
<div class="wrapper">
		<div class="row" style="margin-top:30px;">
			<div class="col-md-8">
				<div class="col-md-12" style="padding:15px 15px 30px 0px;">				
					<div class="col-md-12">
						<div class="text-right view-count">
							<h3> <i class="fa fa-eye"></i>
								{{$data->views + 1}}
								@if($data->views != 0)
								views
								@else
								view
								@endif
							</h3>
						</div>
						<h1 class="text-uppercase">{{$data->title}}</h1>
						<a><img src="{{asset('images')}}/{{$data->image}}" width="100%" style="margin-bottom:15px;" /></a>
						 {!! $data->description !!}
						 <div class=share-this>
							 <h4>Share this...</h4>
							 <div class="fb-share-button" data-href="{{url('article')}}/{{$data->slug}}" data-layout="button" 
							 data-size="large">
							 <a target="_blank"  class="fb-xfbml-parse-ignore">Share</a></div>
						 </div>
					</div>		
						<div class="col-md-12 also-like">
						<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;">
					   <span style="padding:6px 12px; background:#2b99ca;">You may also like...</span></h3>
						</div>	
						@foreach($related as $r)		
						<div class="col-md-4">
						<a href="{{url('article')}}/{{$r->slug}}">
						<img src="{{asset('images')}}/{{$r->image}}" width="100%" style="margin-bottom:15px;"/></a>
						<h3><a href="{{url('article')}}/{{$r->slug}}">{{$r->title}}</h3>
						{!! substr($r->description,0,100) !!}
						</div>
					   @endforeach
					</div>
				</div>        

<!-- right section -->
			<div class="col-md-4">
				<div class="col-md-12" style="padding:15px;">
					<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;">
					<span style="padding:6px 12px; background:#2b99ca;">LATEST NEWS</span></h3>
					@foreach($latest as $l)
					<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
						<div class="col-md-4">
							<div class="row">
							<a href="{{url('article')}}/{{$l->slug}}">
						<img src="{{asset('images')}}/{{$l->image}}" width="100%" style="margin-bottom:15px;"/></a>
							</div>
						</div>
						<div class="col-md-8">
							<div class="row" style="padding-left:10px;">
								<h4><a href="{{url('article')}}/{{$l->slug}}">{{$l->title}}</a></h4>
							</div>
						</div>
					</div>
					@endforeach
			</div>
		</div> 
	</div>
@stop        