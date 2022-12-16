<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NEWS HUB</title>
@yield('title');
<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet"  />
<link href="{{ asset('css/bootstrap-theme.min.css')}}" rel="stylesheet"  />
<link href="{{ asset('css/style.css')}}" rel="stylesheet"/>
<script src="{{ asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/bootstrap.min.js')}}"></script>
</head>
<body>
<div class="col-md-12 top" id="top">
	<div class="col-md-9 top-left">
    	<div class="col-md-3">
		<span class="day" style="font-size:30.0pt; font-family:Arial,sans-serif;color:gray; text-align: center">
			<b>NEWSHUB</b></span> 
    		<span class="day" style="font-size:20.0pt; font-family:verdana,serif;color:blue; text-align: center">
			<b>{{date('l,M d, Y')}}</b></span> 
        </div>
		<div class="col-md-9">
			<span class="latest" style="font-size:20.0pt; font-family:verdana,serif;color:blue; text-align: center">Latest: </span><a href="{{url('article')}}/{{$lastnews->slug}}">{{$lastnews->title}}</a>
		</div>
    </div>
    <div class="col-md-3">
    	<a href="{{url('https://www.facebook.com')}}"><img src="{{ asset('images/icon-fb.png')}}" /></a>
    	<a href="{{url('https://www.twitter.com')}}"><img src="{{ asset('images/icon-twitter.png')}}" /></a>
    	<a href="{{url('https://www.google.com')}}"><img src="{{ asset('images/icon-google.png')}}" /></a>
    	<a href="#"><img src="{{ asset('images/icon-insta.png')}}" /></a>
    	<a href="#"><img src="{{ asset('images/icon-youtube.png')}}" /></a>
    </div>
</div>


<div class="col-md-12 main-menu">
	<div class="col-md-10 menu">
		<nav class="navbar">
			<div class="navbar-header">
    			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar"> 
					<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
        		</button>
        		<span class="navbar-brand"><font color="#555555" size="20.0pt" family="courier">NEWS</font><font color="#2ca0c9" size="20.0pt" family="courier">HUB</font></span>
    		</div>
    		<div class="collapse navbar-collapse" id="mynavbar">
    			<ul class="nav nav-justified">
    				<li><a href="{{url('/')}}" class="active"><span 
					class="glyphicon glyphicon-home"></span></a></li>
					@foreach($categories as $cat)
					<li><a href="{{url('categories')}}/{{$cat->slug}}" class="text-uppercase">
    				{{$cat->title}}</a></li>
					@endforeach
        		</ul> 
			</div>
		</nav>
	</div>
	<div class="col-md-2 ">
		<div class="search">
    	<input type="search" id="search_content" class="form-control" />
		<span class="glyphicon glyphicon-search search-btn"></span>
		<div id="search-output"></div>
    </div>
</div> 
@yield('content')

<div class="col-md-12 bottom">
    	<div class="col-md-4">
        	<h3 style="border-bottom:2px solid #ccc;"><span style="border-bottom:2px solid ;">About Us</span></h3>
            <span class="name"><font color="blue" size="4.0pt">NEWSHUB</font></span>
            <p align="justify">
				<font color="white" size="2.0pt" family="Arial">a New Zealand multi-platform news service that airs on TV channel Three, radio stations run by MediaWorks Radio, and on digital platforms. The Newshub brand replaced 3 News service on the TV3 network and the Radio Live news service heard on MediaWorks Radio stations on 1 February 2016.In late 2020, MediaWorks sold Newshub to US multimedia company Discovery, Inc.</font></p>
        </div>
        <div class="col-md-4">
        	<div class="col-md-12">
            	<h3 style="border-bottom:2px solid #ccc;"><span style="border-bottom:2px solid ;">Quick Links</span></h3>   
          <ul class="nav">
			  @foreach($pages as $page)
			  <li><a href="{{url('page')}}/{{$page->slug}}" class="text:uppercase">{{$page->title}}</a></li>
			  @endforeach
			  <li><a href="{{url('contact-us')}}/" class="text:uppercase">Contact US</a></li>
            </ul>
			</div> </div> 
        <div class="col-md-4">
        	<h3 style="border-bottom:2px solid #ccc;"><span style="border-bottom:2px solid ;">Contact Us</span></h3>
            <span class="navbar-brand"><font color="blue">NEWSHUB</font></span><br/>
            <p>Follow us at:</p>
            <a href="{{url('https://www.facebook.com')}}"><img src="{{ asset('images/icon-fb.png')}}" /></a>
    		<a href="{{url('https://www.twitter.com')}}"><img src="{{ asset('images/icon-twitter.png')}}" /></a>
    		<a href="{{url('https://www.google.com')}}"><img src="{{ asset('images/icon-google.png')}}" /></a>
    		<a href="#"><img src="{{ asset('images/icon-insta.png')}}" /></a><br />
            <a href="#top" class="btn btn-default goto"><span class="glyphicon glyphicon-arrow-up"></span></a><br />
        </div>
</div>

<div class="col-md-12 text-center copyright">
		Copyright &copy; {{date('Y')}} <a href="#">NEWSHUB</a> Powered by: <a href="#">DREAMTEAM</a>
</div>

<script>
	$('#search_content').keyup(function(){
		var text =$('#search_content').val();
		if(text.length < 1)
		{
			$('#search-output').hide();
			return false;
		}
		else
		{
			$.ajax({
				type:"get",
				url :"{{url('search-content')}}" ,
				data:{text:text} ,
				success:function(res){
					$('#search-output').show();
					$('#search-output').html(res);
				}
			})
		}
	})
</script>
</body>
</html>
