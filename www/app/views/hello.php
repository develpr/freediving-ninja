<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Freediving.Ninja</title>
	<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="/css/app.min.css" />
</head>
<body>

	<div class="row">		
		<div class="columns small-12 large-7 small-centered" style="margin-top:3em; margin-bottom:1em;">
			<h5>Interested in tracking your freediving progress over time or comparing and analyzing data with others divers? Sign up below to be notified of updates to <strong>freediving.ninja</strong>.</h5>
		</div>
	</div>
	
	<?php if(Session::get('success')): ?>
	<div class="row">	
		<p class="notice small-12 large-7 small-centered">
			<strong>Thanks for your interest! Talk with you soon!</strong>
		</p>
	</div>
	<?php endif; ?>
	
	<form id="signup" class="row" action="/notify-me" method="post">
		<div class="columns  small-12 large-7 small-centered">
			<input id="email" name="email" type="email" placeholder="Email" autofocus required>
			<label class="optional">Optional</label>
			<input class="optional" id="fname" name="fname" type="text" placeholder="First Name">
			<input class="optional" id="lname" name="lname" type="text" placeholder="Last Name">
			<input type="submit" id="submit" class="button tiny" style="font-weight:bolder;" value="Register">
		</div>
	</form>

	<div class="row">
		<div class="large-4 small-10 small-centered columns">
		  	<img src="/img/image.png" alt="Freediving Ninja" />
		</div>
	</div>
	
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-10817444-26', 'freediving.ninja');
	ga('require', 'displayfeatures');
	ga('send', 'pageview');
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="/js/build/app.js"></script>
<script>
	$('#email').on('keyup', function(){
		if($.trim($(this).val()).length > 0){
			$('.optional').fadeIn('slow');
		}
	});
</script>
</body>
</html>
