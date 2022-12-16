@extends('frontend.master')
@section('content')
<div class="wrapper">
	@if(count($featured) > 0)
	<div class="row">
		@foreach($featured as $key=>$f)
		@if($key == 0)
		<div class="col-md-6">
			<div class="relative">
    		<a href="{{url('article')}}/{{$f->slug}}"><img src="{{asset('images')}}/{{$f->image}}" width="100%" /></a>
            <span class="caption">{{$f->title}}</span>
    	</div>
       </div>
		@endif
		@endforeach
    		<div class="row">
			@foreach($featured as $key=>$f)
		     @if($key > 0 && $key < 3 )
			 <div class="col-md-6">
			 <div class="relative">
    		<a href="{{url('article')}}/{{$f->slug}}"><img src="{{asset('images')}}/{{$f->image}}" width="100%" /></a>
            <span class="caption">{{$f->title}}</span>
    	         </div>
    	        </div>
				@endif
				@endforeach
        	</div>
        	<div class="row" style="margin-top:30px;">
			@foreach($featured as $key=>$f)
		     @if($key > 3 && $key < 6)
			    <div class="col-md-6">
				<div class="relative">
    		<a href="{{url('article')}}/{{$f->slug}}"><img src="{{asset('images')}}/{{$f->image}}" width="100%" /></a>
            <span class="caption">{{$f->title}}</span>
    	     </div>
    	        </div>
			 @endif
			 @endforeach
        	</div>        
    	</div>
	</div>
    @endif
    <div class="row" style="margin-top:30px;">
    	<div class="col-md-8">
        <div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 0px;">
        	<div class="col-md-12">
        		<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;">
				<span style="padding:6px 12px; background:#81d742;">NEWS</span></h3>
        	</div>
        	<div class="col-md-6">
				@foreach($general as $key=>$g)
				@if($key == 0)
            	<a href="{{url('article')}}/{{$g->slug}}">
				<img src="{{asset('images')}}/{{$g->image}}" width="100%" style="margin-bottom:15px;" /></a>
				<h3><a href="{{url('article')}}/{{$g->slug}}">{{$g->title}}</a></h3>
        		<p align="justify">{!! substr($g->description,0,300) !!}</p>
				<a href="{{url('article')}}/{{$g->slug}}">Read more &raquo;</a>
					@endif
				@endforeach	
            </div>
            <div class="col-md-6">
			@foreach($general as $key=>$g)
				@if($key > 0  && $key < 6 )
            	<div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row">
						<a href="{{url('article')}}/{{$g->slug}}">
				<img src="{{asset('images')}}/{{$g->image}}" width="100%" /></a>
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row">
                			<h4><a href="{{url('article')}}/{{$g->slug}}">{{$g->title}}</a></h4>
                		</div>
                    </div>
                </div>
				@endif
				@endforeach
            </div></div>
        </div>
<div class="col-md-12 image-gallery" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px; margin-bottom:30px;">
<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;">
<span style="padding:6px 12px; background:#81d742;">BUSINESS</span></h3>
  <div class="flex">
    @foreach($business as $b)
      <div>
        <a href="{{url('article')}}/{{$b->slug}}"><img src="{{asset('images')}}/{{$b->image}}"></a>
      </div>

	  <div class="col-md-8">
                    	<div class="row">
                			<h4><a href="{{url('article')}}/{{$b->slug}}">{{$b->title}}</a></h4>
                		</div>
                    </div>
     @endforeach
   </div>
   </div>
   
        <div class="row">
        	<div class="col-md-6">
            <div class="col-md-12" style="border:1px solid #ccc; padding-bottom:30px;">
            	<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:20px 10px; margin-bottom:10px;">
                <h3 style="border-bottom:3px solid #b952c8; padding-bottom:5px;">
				<span style="padding:6px 12px; background:#b952c8;">SPORTS</span></h3>
				@foreach($sports as $key=>$s)
				@if($key == 0)
            	<a href="{{url('article')}}/{{$s->slug}}">
				<img src="{{asset('images')}}/{{$s->image}}" width="100%" style="margin-bottom:15px;" /></a>
				<h3><a href="{{url('article')}}/{{$s->slug}}">{{$s->title}}</a></h3>
        		<p align="justify">{!! substr($s->description,0,300) !!}</p>
				<a href="{{url('article')}}/{{$g->slug}}">Read more &raquo;</a>
					@endif
				@endforeach	
            	</div>
				@foreach($sports as $key=>$s)
				@if($key > 0 && $key < 5)
                <div class="col-md-12" style="border-bottom:1px solid #ccc; 
				padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row fashion">
						<a href="{{url('article')}}/{{$s->slug}}">
				<img src="{{asset('images')}}/{{$s->image}}" width="100%" style="margin-bottom:15px;" /></a>
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row">
                			<h4><a href="{{url('article')}}/{{$s->slug}}">{{$s->title}}</a></h4>
                		</div>
                    </div>
                </div>
				@endif
				@endforeach
            </div></div>
        	<div class="col-md-6">
            <div class="col-md-12" style="border:1px solid #ccc; padding-bottom:30px;">
            	<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:20px 10px; margin-bottom:10px;">
                <h3 style="border-bottom:3px solid #d95757; padding-bottom:5px;">
				<span style="padding:6px 12px; background:#d95757;">TECHNOLOGY</span></h3>
				@foreach($technology as $key=>$t)
				@if($key == 0)
            	<a href="{{url('article')}}/{{$t->slug}}">
				<img src="{{asset('images')}}/{{$t->image}}" width="100%" style="margin-bottom:15px;" /></a>
				<h3><a href="{{url('article')}}/{{$t->slug}}">{{$t->title}}</a></h3>
        		<p align="justify">{!! substr($t->description,0,300) !!}</p>
				<a href="{{url('article')}}/{{$t->slug}}">Read more &raquo;</a>
					@endif
				@endforeach	
				</div>
                @foreach($technology as $key=>$t)
				@if($key > 0 && $key < 5)
                <div class="col-md-12" style="border-bottom:1px solid #ccc; 
				padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row fashion">
						<a href="{{url('article')}}/{{$t->slug}}">
				<img src="{{asset('images')}}/{{$t->image}}" width="100%" style="margin-bottom:15px;" /></a>
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row">
                			<h4><a href="{{url('article')}}/{{$t->slug}}">{{$t->title}}</a></h4>
                		</div>
                    </div>
                </div>
				@endif
				@endforeach
            </div></div>

        <div class="col-md-12 image-gallery">
	        <div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px;">
    	    	<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;">
				<span style="padding:6px 12px; background:#81d742;">HEALTH</span></h3>
        	  <div class="flex">
             @foreach($health as $h)
            <div>
              <a href="{{url('article')}}/{{$h->slug}}"><img src="{{asset('images')}}/{{$h->image}}">{{$h->title}}</a>
			  <p align="justify">{!! substr($h->description,0,300) !!}</p>
				<a href="{{url('article')}}/{{$h->slug}}">Read more &raquo;</a>
             </div>
             @endforeach
            </div>
        </div></div>
        <div class="col-md-12 image-gallery">
	        <div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px;">
    	    	<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;">
				<span style="padding:6px 12px; background:#81d742;">TRAVEL</span></h3>
        	  <div class="flex">
             @foreach($travel as $tv)
            <div>
              <a href="{{url('article')}}/{{$tv->slug}}"><img src="{{asset('images')}}/{{$tv->image}}">{{$tv->title}}</a>
			  <p align="justify">{!! substr($tv->description,0,300) !!}</p>
				<a href="{{url('article')}}/{{$tv->slug}}">Read more &raquo;</a>
             </div>
             @endforeach
            </div>
        </div></div>
        
		<div class="row">
        	<div class="col-md-6">
            <div class="col-md-12" style="border:1px solid #ccc; padding-bottom:30px;">
            	<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:20px 10px; margin-bottom:10px;">
                <h3 style="border-bottom:3px solid #b952c8; padding-bottom:5px;">
				<span style="padding:6px 12px; background:#b952c8;">ENTERTAINMENT</span></h3>
				@foreach($entertainment as $key=>$e)
				@if($key == 0)
            	<a href="{{url('article')}}/{{$e->slug}}">
				<img src="{{asset('images')}}/{{$e->image}}" width="100%" style="margin-bottom:15px;" /></a>
				<h3><a href="{{url('article')}}/{{$e->slug}}">{{$e->title}}</a></h3>
        		<p align="justify">{!! substr($e->description,0,300) !!}</p>
				<a href="{{url('article')}}/{{$e->slug}}">Read more &raquo;</a>
					@endif
				@endforeach	
            	</div>
				@foreach($entertainment  as $key=>$e)
				@if($key > 0 && $key < 5)
                <div class="col-md-12" style="border-bottom:1px solid #ccc; 
				padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row fashion">
						<a href="{{url('article')}}/{{$e->slug}}">
				<img src="{{asset('images')}}/{{$e->image}}" width="100%" style="margin-bottom:15px;" /></a>
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row">
                			<h4><a href="{{url('article')}}/{{$e->slug}}">{{$e->title}}</a></h4>
                		</div>
                    </div>
				@endif
				@endforeach
				</div>
            </div></div>
        </div>
		<div class="row">
        	<div class="col-md-6">
            <div class="col-md-12" style="border:1px solid #ccc; padding-bottom:30px;">
            	<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:20px 10px; margin-bottom:10px;">
                <h3 style="border-bottom:3px solid #b952c8; padding-bottom:5px;">
				<span style="padding:6px 12px; background:#b952c8;">POLITICS</span></h3>
				@foreach($politics as $key=>$p)
				@if($key == 0)
            	<a href="{{url('article')}}/{{$p->slug}}">
				<img src="{{asset('images')}}/{{$p->image}}" width="100%" style="margin-bottom:15px;" /></a>
				<h3><a href="{{url('article')}}/{{$p->slug}}">{{$p->title}}</a></h3>
        		<p align="justify">{!! substr($p->description,0,300) !!}</p>
				<a href="{{url('article')}}/{{$p->slug}}">Read more &raquo;</a>
					@endif
				@endforeach	
            	</div>
				@foreach($politics  as $key=>$p)
				@if($key > 0 && $key < 5)
                <div class="col-md-12" style="border-bottom:1px solid #ccc; 
				padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row fashion">
						<a href="{{url('article')}}/{{$p->slug}}">
				<img src="{{asset('images')}}/{{$p->image}}" width="100%" style="margin-bottom:15px;" /></a>
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row">
                			<h4><a href="{{url('article')}}/{{$p->slug}}">{{$p->title}}</a></h4>
                		</div>
                    </div>
				@endif
				@endforeach
				</div>
            </div></div>
        </div>
          <div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 60px 15px; margin-top:30px;">
          	<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:0px 10px 20px 10px; margin-bottom:10px;">
           		<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;">
				   <span style="padding:6px 12px; background:#2b99ca;">STYLE</span></h3>
				   @foreach($style as $key=>$st)
				@if($key == 0)
            	<a href="{{url('article')}}/{{$st->slug}}">
				<img src="{{asset('images')}}/{{$st->image}}" alt="" class="image" width="100%" style="margin-bottom:15px;" /></a>
				<h3><a href="{{url('article')}}/{{$st->slug}}">{{$st->title}}</a></h3>
        		<p align="justify">{!! substr($st->description,0,300) !!}</p>
				<a href="{{url('article')}}/{{$st->slug}}">Read more &raquo;</a>
					@endif
				@endforeach	
				</div>
                @foreach($style as $key=>$st)
				@if($key > 0 && $key < 5)
                <div class="col-md-12" style="border-bottom:1px solid #ccc; 
				padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row fashion">
						<a href="{{url('article')}}/{{$st->slug}}">
				<img src="{{asset('images')}}/{{$st->image}}" width="100%" style="margin-bottom:15px;" /></a>
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row">
                			<h4><a href="{{url('article')}}/{{$st->slug}}">{{$st->title}}</a></h4>
                		</div>
                    </div>
                </div>
				@endif
				@endforeach
            </div></div>
@stop