<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Freediving.Ninja</title>
	<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<style>
		html{
			height:100%;
		}
		body, html{
			font-family:"Helvetica Neue Light", "HelveticaNeue-Light", "Helvetica Neue", Calibri, Helvetica, Arial;
			height:100%;
			background: #4f7ebc; /* Old browsers */
			background: -moz-linear-gradient(top, #4f7ebc 0%, #2989d8 32%, #207cca 56%, #1e5799 100%); /* FF3.6+ */
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#4f7ebc), color-stop(32%,#2989d8), color-stop(56%,#207cca), color-stop(100%,#1e5799)); /* Chrome,Safari4+ */
			background: -webkit-linear-gradient(top, #4f7ebc 0%,#2989d8 32%,#207cca 56%,#1e5799 100%); /* Chrome10+,Safari5.1+ */
			background: -o-linear-gradient(top, #4f7ebc 0%,#2989d8 32%,#207cca 56%,#1e5799 100%); /* Opera 11.10+ */
			background: -ms-linear-gradient(top, #4f7ebc 0%,#2989d8 32%,#207cca 56%,#1e5799 100%); /* IE10+ */
			background: linear-gradient(to bottom, #4f7ebc 0%,#2989d8 32%,#207cca 56%,#1e5799 100%); /* W3C */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4f7ebc', endColorstr='#1e5799',GradientType=0 ); /* IE6-9 */
			background-repeat: no-repeat;
			background-attachment: fixed;
		}

		.content{
			width:600px;
			margin:2em auto;
			font-size:1.3em;
			color:white;
		}

		.content p{
			margin:.5em;
		}

		fieldset, form{border:none; padding:0; width:100%; margin:1.2em 0;}

		input{
			font-family:"Helvetica Neue Light", "HelveticaNeue-Light", "Helvetica Neue", Calibri, Helvetica, Arial;

			border:none;
			background:white;

			font-size: .7em;

			padding:.8em;
			width:65%;
			display:block;
			margin:0 0 .9em 0;
			float:left;

		}

		.optional{
			display:none;
		}

		input[type=submit]{
			font-weight: bolder;
			float:right;
			width:28%;
		}

		input[type=submit]:hover{
			background: #54c2f4;
			cursor:pointer;
		}

		.notice{
			background: rgb(51, 83, 141);
			padding:1em;
		}
	</style>
</head>
<body>
<div class="content">
	<p>
		Interested in tracking your freediving progress over time or comparing and analyzing data with others divers? Sign up below to be notified of updates to <strong>freediving.ninja</strong>.
	</p>

	<?php if(Session::get('success')): ?>
		<p class="notice">
			<strong>Thanks for your interest! Talk with you soon!</strong>
		</p>
	<?php endif; ?>
	<form id="signup" action="/notify-me" method="post">
		<fieldset id="inputs">

			<input id="email" name="email" type="email" placeholder="Email" autofocus required>

			<input type="submit" id="submit" value="Register">

			<p class="optional">
				Optional:
			</p>
			<input class="optional" id="fname" name="fname" type="text" placeholder="First Name" >
			<input class="optional" id="lname" name="lname" type="text" placeholder="Last Name">



		</fieldset>
	</form>

	<img src="/img/image.png" style="display:block; width:55%; margin: 0 auto;" alt="Freediving Ninja" />
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
<script>
	$('#email').on('keyup', function(){
		if($.trim($(this).val()).length > 0){
			$('.optional').fadeIn('slow');
		}
	});
</script>
</body>
</html>
